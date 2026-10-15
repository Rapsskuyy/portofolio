import { cp, mkdir, readFile, rm, writeFile } from 'node:fs/promises';
import { dirname, extname, join, resolve } from 'node:path';

const exportUrl = process.env.PUBLIC_CONTENT_EXPORT_URL;
const exportToken = process.env.PUBLIC_CONTENT_EXPORT_TOKEN;
const exportFile = process.env.PUBLIC_CONTENT_EXPORT_FILE;
const sourcePublicDirectory = resolve('../public');
const outputDirectory = resolve('dist');

if (!exportFile && (!exportUrl || !exportToken)) {
    throw new Error('PUBLIC_CONTENT_EXPORT_URL and PUBLIC_CONTENT_EXPORT_TOKEN are required for the static build.');
}

const snapshot = exportFile
    ? JSON.parse(await readFile(resolve(exportFile), 'utf8'))
    : await fetch(exportUrl, {
        headers: { Authorization: `Bearer ${exportToken}`, Accept: 'application/json' },
    }).then(async (response) => {
        if (!response.ok) {
            throw new Error(`Public content export failed with HTTP ${response.status}.`);
        }

        return response.json();
    });

if (snapshot?.version !== 1 || !snapshot?.pages || typeof snapshot.pages !== 'object') {
    throw new Error('Public content export has an unsupported schema.');
}

await rm(outputDirectory, { recursive: true, force: true });
await mkdir(outputDirectory, { recursive: true });
await cp(sourcePublicDirectory, outputDirectory, {
    recursive: true,
    filter: (source) => extname(source) !== '.php' && !source.includes(join('public', 'build')),
});

const backendOrigin = exportUrl ? new URL(exportUrl).origin.replace(/\/$/, '') : null;

for (const [pathname, html] of Object.entries(snapshot.pages)) {
    if (typeof html !== 'string' || !html.includes('<html')) {
        throw new Error(`Invalid rendered HTML for ${pathname}.`);
    }

    const destination = pathname === '/'
        ? join(outputDirectory, 'index.html')
        : join(outputDirectory, pathname.replace(/^\//, ''), 'index.html');

    const staticHtml = (backendOrigin ? html.replaceAll(backendOrigin, '') : html)
        .replace(/<input\b[^>]*\bname="_token"[^>]*>\s*/gi, '');

    await mkdir(dirname(destination), { recursive: true });
    await writeFile(destination, staticHtml);
}

await writeFile(join(outputDirectory, 'public-content.json'), `${JSON.stringify(snapshot.data)}\n`);
await writeFile(join(outputDirectory, '_headers'), '/\n  Cache-Control: public, max-age=0, must-revalidate\n');
