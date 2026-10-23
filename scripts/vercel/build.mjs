import { spawnSync } from 'node:child_process';
import fs from 'node:fs';
import { createRequire } from 'node:module';
import os from 'node:os';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const scriptDirectory = path.dirname(fileURLToPath(import.meta.url));
const projectRoot = path.resolve(scriptDirectory, '..', '..');
const outputDirectory = path.join(projectRoot, '.vercel', 'output');
const functionDirectory = path.join(outputDirectory, 'functions', 'api', 'index.php.func');
const require = createRequire(import.meta.url);
const phpPackageDirectory = path.dirname(require.resolve('@libphp/amazon-linux-2023-v84/package.json'));
const phpBinaryDirectory = path.join(phpPackageDirectory, 'native', 'php');
const phpLibraryDirectory = path.join(phpPackageDirectory, 'native', 'lib');
const maximumFunctionSize = 240 * 1024 * 1024;

const runtimeProjectEntries = new Set([
    'api',
    'app',
    'artisan',
    'bootstrap',
    'composer.json',
    'composer.lock',
    'config',
    'public',
    'resources',
    'routes',
    'vendor',
]);

const staticRoutes = [
    { src: '^/build/(.*)$', dest: '/public/build/$1' },
    { src: '^/css/(.*)$', dest: '/public/css/$1' },
    { src: '^/js/(.*)$', dest: '/public/js/$1' },
    { src: '^/images/(.*)$', dest: '/public/images/$1' },
    { src: '^/projects/(.*)$', dest: '/public/projects/$1' },
    { src: '^/files/(.*)$', dest: '/public/files/$1' },
    { src: '^/favicon\\.ico$', dest: '/public/favicon.ico' },
    { src: '^/favicon\\.svg$', dest: '/public/favicon.svg' },
    { src: '^/favicon\\.png$', dest: '/public/favicon.png' },
    { src: '^/favicon-(.*)\\.png$', dest: '/public/favicon-$1.png' },
    { src: '^/apple-touch-icon\\.png$', dest: '/public/apple-touch-icon.png' },
    { src: '^/robots\\.txt$', dest: '/public/robots.txt' },
];

main();

function main() {
    if (process.platform !== 'linux') {
        throw new Error('The Vercel PHP runtime bundle must be built in its Linux build environment.');
    }

    if (!fs.existsSync(path.join(projectRoot, 'composer.lock'))) {
        throw new Error('composer.lock is required to build the Vercel PHP function.');
    }

    installComposerDependencies();
    clearGeneratedOutput();

    const applicationDirectory = path.join(functionDirectory, 'user');
    copyProject(applicationDirectory);
    copyPhpRuntime();
    fs.copyFileSync(path.join(scriptDirectory, 'launcher.mjs'), path.join(functionDirectory, 'index.mjs'));

    writeJson(path.join(functionDirectory, '.vc-config.json'), {
        runtime: `nodejs${process.versions.node.split('.')[0]}.x`,
        handler: 'index.mjs',
        launcherType: 'Nodejs',
        shouldAddHelpers: false,
        maxDuration: 30,
    });

    copyStaticFiles(path.join(outputDirectory, 'static', 'public'));
    writeJson(path.join(outputDirectory, 'config.json'), {
        version: 3,
        routes: [
            ...staticRoutes,
            { src: '^/(.*)$', dest: '/api/index.php' },
        ],
    });

    const functionSize = directorySize(functionDirectory);
    if (functionSize > maximumFunctionSize) {
        throw new Error(`Vercel PHP function bundle is too large (${formatSize(functionSize)}).`);
    }

    console.log(`Built Vercel PHP function (${formatSize(functionSize)}).`);
}

function installComposerDependencies() {
    runComposer(['install', '--no-dev', '--no-interaction', '--no-scripts', '--ignore-platform-reqs', '--no-progress']);
}

function runComposer(arguments_) {
    const result = spawnSync(
        path.join(phpBinaryDirectory, 'php'),
        [
            '-d',
            `extension_dir=${path.join(phpBinaryDirectory, 'modules')}`,
            path.join(phpBinaryDirectory, 'composer'),
            ...arguments_,
        ],
        {
            cwd: projectRoot,
            stdio: 'inherit',
            env: {
                ...process.env,
                COMPOSER_HOME: path.join(os.tmpdir(), 'composer'),
                LD_LIBRARY_PATH: `${phpLibraryDirectory}:${process.env.LD_LIBRARY_PATH ?? ''}`,
                PATH: `${phpBinaryDirectory}:${process.env.PATH ?? ''}`,
            },
        },
    );

    if (result.error) {
        throw result.error;
    }

    if (result.status !== 0) {
        throw new Error(`composer ${arguments_[0]} failed with exit code ${result.status}.`);
    }
}

function clearGeneratedOutput() {
    const expectedOutput = path.resolve(projectRoot, '.vercel', 'output');
    if (path.resolve(outputDirectory) !== expectedOutput || !expectedOutput.startsWith(`${projectRoot}${path.sep}`)) {
        throw new Error('Refusing to clear an unexpected Vercel build output path.');
    }

    fs.rmSync(expectedOutput, { recursive: true, force: true });
}

function copyProject(destination) {
    fs.mkdirSync(destination, { recursive: true });

    for (const entry of fs.readdirSync(projectRoot)) {
        if (!runtimeProjectEntries.has(entry)) {
            continue;
        }

        const source = path.join(projectRoot, entry);
        const target = path.join(destination, entry);

        if (entry === 'public') {
            copyRuntimePublicFiles(target);
            continue;
        }

        fs.cpSync(source, target, {
            dereference: true,
            recursive: true,
        });
    }
}

function copyRuntimePublicFiles(destination) {
    fs.mkdirSync(path.join(destination, 'build'), { recursive: true });
    fs.mkdirSync(path.join(destination, 'css'), { recursive: true });
    fs.mkdirSync(path.join(destination, 'js'), { recursive: true });
    fs.copyFileSync(path.join(projectRoot, 'public', 'index.php'), path.join(destination, 'index.php'));
    fs.copyFileSync(path.join(projectRoot, 'public', 'build', 'manifest.json'), path.join(destination, 'build', 'manifest.json'));
    fs.copyFileSync(path.join(projectRoot, 'public', 'css', 'portfolio.css'), path.join(destination, 'css', 'portfolio.css'));
    fs.copyFileSync(path.join(projectRoot, 'public', 'js', 'portfolio.js'), path.join(destination, 'js', 'portfolio.js'));
}

function copyPhpRuntime() {
    const runtimeDirectory = path.join(functionDirectory, 'php');
    fs.mkdirSync(runtimeDirectory, { recursive: true });

    const phpPath = path.join(runtimeDirectory, 'php');
    fs.copyFileSync(path.join(phpBinaryDirectory, 'php'), phpPath);
    fs.chmodSync(phpPath, 0o755);
    fs.copyFileSync(path.join(phpBinaryDirectory, 'php.ini'), path.join(runtimeDirectory, 'php.ini'));
    fs.cpSync(path.join(phpBinaryDirectory, 'modules'), path.join(runtimeDirectory, 'modules'), { recursive: true });
    fs.cpSync(phpLibraryDirectory, path.join(functionDirectory, 'lib'), { recursive: true });
}

function copyStaticFiles(destination) {
    const publicDirectory = path.join(projectRoot, 'public');
    fs.cpSync(publicDirectory, destination, {
        filter: (source) => {
            const relativePath = path.relative(publicDirectory, source).split(path.sep).join('/');
            return !['index.php', '.htaccess', 'hot', 'storage'].includes(relativePath);
        },
        recursive: true,
    });
}

function writeJson(filePath, value) {
    fs.mkdirSync(path.dirname(filePath), { recursive: true });
    fs.writeFileSync(filePath, `${JSON.stringify(value, null, 2)}\n`);
}

function directorySize(directory) {
    return fs.readdirSync(directory, { withFileTypes: true }).reduce((total, entry) => {
        const entryPath = path.join(directory, entry.name);
        return total + (entry.isDirectory() ? directorySize(entryPath) : fs.lstatSync(entryPath).size);
    }, 0);
}

function formatSize(bytes) {
    return `${(bytes / 1024 / 1024).toFixed(1)} MB`;
}
