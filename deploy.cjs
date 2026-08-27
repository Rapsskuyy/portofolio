const { execSync } = require('child_process');
const fs = require('fs');

// Load environment variables manually since we don't have the dotenv package installed
let envFile = '';
try {
    envFile = fs.readFileSync('.env', 'utf8');
} catch (e) {
    console.error('❌ Gagal membaca file .env');
    process.exit(1);
}

const env = {};
envFile.split('\n').forEach(line => {
    const parts = line.split('=');
    if (parts.length >= 2) {
        const key = parts.shift().trim();
        const value = parts.join('=').trim();
        if (key && !key.startsWith('#')) env[key] = value;
    }
});

const FTP_HOST = env.FTP_HOST || 'ftp.byethost16.com';
const FTP_USER = env.FTP_USER;
const FTP_PASS = env.FTP_PASS;
const SITE_URL = env.APP_URL || 'http://rapskuy.byethost16.com';

if (!FTP_USER || !FTP_PASS) {
    console.error('❌ ERROR: Kredensial FTP belum diatur!');
    console.error('Silakan tambahkan baris berikut di file .env Anda:');
    console.error('FTP_HOST=ftp.byethost16.com');
    console.error('FTP_USER=username_byethost_anda');
    console.error('FTP_PASS=password_byethost_anda');
    process.exit(1);
}

// Prepare unzip.php script
const unzipScript = `<?php
$zip = new ZipArchive;
$res = $zip->open('laravel.zip');
if ($res === TRUE) {
    $zip->extractTo('./');
    $zip->close();
    
    // Bikin index.php untuk shared hosting
    $index = <<<EOD
<?php
use Illuminate\Http\Request;
define('LARAVEL_START', microtime(true));
if (file_exists(\\$maintenance = __DIR__.'/storage/framework/maintenance.php')) {
    require \\$maintenance;
}
require __DIR__.'/vendor/autoload.php';
\\$app = require_once __DIR__.'/bootstrap/app.php';
\\$app->bind('path.public', function() {
    return __DIR__;
});
\\$app->handleRequest(Request::capture());
EOD;
    file_put_contents('index.php', $index);

    // Bikin .htaccess
    $htaccess = <<<EOD
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>
    RewriteEngine On
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
EOD;
    file_put_contents('.htaccess', $htaccess);

    // Pindah public assets ke root (agar CSS/JS jalan)
    if (is_dir('public')) {
        \\$files = scandir('public');
        foreach (\\$files as \\$file) {
            if (\\$file != '.' && \\$file != '..' && \\$file != 'index.php' && \\$file != '.htaccess') {
                @rename("public/\\$file", \\$file);
            }
        }
    }

    echo "SUCCESS";
    @unlink('laravel.zip');
    @unlink(__FILE__);
} else {
    echo "FAILED";
}
?>`;

fs.writeFileSync('unzip.php', unzipScript);

console.log('🚀 Memulai proses deploy ke Byethost...');
console.log('📦 1. Mengunggah laravel.zip (Ini mungkin memakan waktu beberapa menit)...');

try {
    // Upload laravel.zip
    execSync(`curl.exe -T laravel.zip ftp://${FTP_HOST}/htdocs/laravel.zip --user "${FTP_USER}:${FTP_PASS}"`, { stdio: 'inherit' });
    
    console.log('📄 2. Mengunggah script unzipper...');
    // Upload unzip.php
    execSync(`curl.exe -T unzip.php ftp://${FTP_HOST}/htdocs/unzip.php --user "${FTP_USER}:${FTP_PASS}"`, { stdio: 'inherit' });
    
    console.log('⚙️ 3. Mengekstrak file di server jarak jauh...');
    // Trigger unzip.php
    const extractUrl = 'http://rapskuy.byethost16.com/unzip.php';
    try {
        const result = execSync(`curl.exe -s -m 10 ${extractUrl}`).toString();
        if (result.includes('SUCCESS')) {
            console.log('✅ DEPLOY BERHASIL!');
        } else {
            throw new Error('Response did not contain SUCCESS');
        }
    } catch (e) {
        console.log('⚠️ Server Byethost memblokir Curl otomatis (Sistem Anti-Bot).');
        console.log('👇 LAKUKAN INI SEKARANG UNTUK MENYELESAIKAN DEPLOY:');
        console.log(`Buka link ini di browser Anda (Chrome/Edge): ${extractUrl}`);
    }
    
    console.log(`\n🎉 Website Anda: http://rapskuy.byethost16.com/`);

} catch (error) {
    console.error('❌ Gagal melakukan deploy:', error.message);
} finally {
    // Cleanup local unzip.php
    if (fs.existsSync('unzip.php')) {
        fs.unlinkSync('unzip.php');
    }
}
