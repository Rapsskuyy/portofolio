import { spawn } from 'node:child_process';
import http from 'node:http';
import net from 'node:net';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const taskRoot = path.dirname(fileURLToPath(import.meta.url));
const applicationDirectory = path.join(taskRoot, 'user');
const phpDirectory = path.join(taskRoot, 'php');
const libraryDirectory = path.join(taskRoot, 'lib');
const routerPath = path.join(applicationDirectory, 'api', 'index.php');
const host = '127.0.0.1';
const startupTimeoutMs = 10_000;

const hopByHopHeaders = new Set([
    'connection',
    'expect',
    'keep-alive',
    'proxy-connection',
    'te',
    'trailer',
    'transfer-encoding',
    'upgrade',
]);

let phpServerPromise;

export default async function handler(request, response) {
    let port;
    try {
        port = await ensurePhpServer();
    } catch (error) {
        console.error('Unable to start the PHP server:', error);
        sendError(response, 500, 'The application runtime could not start.');
        return;
    }

    try {
        await forwardRequest(request, response, port, await readRequestBody(request));
    } catch (error) {
        console.error('Unable to process the PHP request:', error);
        if (response.headersSent) {
            response.destroy(error);
        } else {
            sendError(response, 502, 'The application could not process the request.');
        }
    }
}

function ensurePhpServer() {
    if (!phpServerPromise) {
        const starting = startPhpServer(() => {
            if (phpServerPromise === starting) {
                phpServerPromise = undefined;
            }
        });
        phpServerPromise = starting;
        starting.catch(() => {
            if (phpServerPromise === starting) {
                phpServerPromise = undefined;
            }
        });
    }

    return phpServerPromise;
}

async function startPhpServer(onExit) {
    const port = await findFreePort();
    const phpProcess = spawn(
        path.join(phpDirectory, 'php'),
        [
            '-c', path.join(phpDirectory, 'php.ini'),
            '-d', `extension_dir=${path.join(phpDirectory, 'modules')}`,
            '-S', `${host}:${port}`,
            '-t', applicationDirectory,
            routerPath,
        ],
        {
            cwd: phpDirectory,
            env: {
                ...process.env,
                LD_LIBRARY_PATH: `${libraryDirectory}:${process.env.LD_LIBRARY_PATH ?? ''}`,
                PATH: `${phpDirectory}:${process.env.PATH ?? ''}`,
                PHP_CLI_SERVER_WORKERS: process.env.PHP_CLI_SERVER_WORKERS ?? '4',
            },
            stdio: ['ignore', 'pipe', 'pipe'],
        },
    );

    phpProcess.stdout.on('data', (data) => console.log(data.toString().trimEnd()));
    phpProcess.stderr.on('data', (data) => console.error(data.toString().trimEnd()));

    let processExited = false;
    let rejectProcessExit;
    const processExit = new Promise((_, reject) => {
        rejectProcessExit = reject;
    });
    const handleExit = (message) => {
        processExited = true;
        onExit();
        rejectProcessExit(new Error(message));
    };

    phpProcess.once('error', (error) => handleExit(`PHP process error: ${error.message}`));
    phpProcess.once('exit', (code, signal) => handleExit(`PHP server exited (code=${code}, signal=${signal}).`));
    processExit.catch(() => {});

    try {
        await Promise.race([waitForPort(port, () => processExited), processExit]);
    } catch (error) {
        phpProcess.kill();
        throw error;
    }

    return port;
}

function findFreePort() {
    return new Promise((resolve, reject) => {
        const server = net.createServer();
        server.unref();
        server.once('error', reject);
        server.listen(0, host, () => {
            const address = server.address();
            if (!address || typeof address === 'string') {
                server.close();
                reject(new Error('Unable to allocate a local PHP port.'));
                return;
            }

            server.close(() => resolve(address.port));
        });
    });
}

function waitForPort(port, isProcessExited) {
    const deadline = Date.now() + startupTimeoutMs;

    return new Promise((resolve, reject) => {
        const attempt = () => {
            const socket = net.connect(port, host);
            socket.once('connect', () => {
                socket.destroy();
                resolve();
            });
            socket.once('error', () => {
                socket.destroy();
                if (isProcessExited()) {
                    return;
                }
                if (Date.now() > deadline) {
                    reject(new Error(`PHP did not listen on port ${port} within ${startupTimeoutMs} ms.`));
                    return;
                }
                setTimeout(attempt, 10);
            });
        };

        attempt();
    });
}

async function readRequestBody(request) {
    const chunks = [];
    for await (const chunk of request) {
        chunks.push(chunk);
    }
    return Buffer.concat(chunks);
}

function forwardRequest(request, response, port, body) {
    const headers = {};
    for (const [name, value] of Object.entries(request.headers)) {
        if (!hopByHopHeaders.has(name)) {
            headers[name] = value;
        }
    }
    headers['content-length'] = String(body.length);

    return new Promise((resolve, reject) => {
        const upstream = http.request(
            { host, port, method: request.method, path: request.url, headers },
            (phpResponse) => {
                response.statusCode = phpResponse.statusCode ?? 502;
                for (const [name, value] of Object.entries(phpResponse.headers)) {
                    if (value !== undefined && name !== 'host' && !hopByHopHeaders.has(name)) {
                        response.setHeader(name, value);
                    }
                }

                phpResponse.once('error', reject);
                response.once('close', resolve);
                response.once('finish', resolve);
                phpResponse.pipe(response);
            },
        );
        upstream.once('error', reject);
        upstream.end(body);
    });
}

function sendError(response, status, message) {
    response.statusCode = status;
    response.setHeader('content-type', 'text/plain; charset=utf-8');
    response.end(message);
}
