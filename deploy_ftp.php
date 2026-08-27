<?php
// deploy_ftp.php

$envFile = file_get_contents('.env');
$lines = explode("\n", $envFile);
$env = [];
foreach($lines as $line) {
    if(trim($line) && strpos(trim($line), '#') !== 0) {
        $parts = explode('=', $line, 2);
        if(count($parts) == 2) {
            $env[trim($parts[0])] = trim($parts[1]);
        }
    }
}

$ftp_server = $env['FTP_HOST'] ?? 'ftpupload.net';
$ftp_user = $env['FTP_USER'] ?? '';
$ftp_pass = $env['FTP_PASS'] ?? '';

if(empty($ftp_user) || empty($ftp_pass) || $ftp_pass == 'MASUKAN_PASSWORD_BYETHOST_ANDA_DISINI') {
    die("❌ Kredensial FTP tidak valid di .env\n");
}

echo "🚀 Menghubungkan ke FTP server...\n";
$conn_id = ftp_connect($ftp_server) or die("❌ Gagal terhubung ke $ftp_server\n");
if (@ftp_login($conn_id, $ftp_user, $ftp_pass)) {
    echo "✅ Terhubung ke FTP.\n";
} else {
    die("❌ Gagal login FTP. Periksa username dan password.\n");
}

ftp_pasv($conn_id, true);

$baseDir = 'htdocs';
$localDirs = ['app', 'public', 'resources', 'routes', 'database'];
$filesToUpload = ['.env', '.htaccess'];

function uploadDirectory($conn_id, $local_dir, $remote_dir) {
    echo "📁 Mengunggah direktori: $local_dir\n";
    @ftp_mkdir($conn_id, $remote_dir);
    $files = scandir($local_dir);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            $local_file = $local_dir . '/' . $file;
            $remote_file = $remote_dir . '/' . $file;
            if (is_dir($local_file)) {
                uploadDirectory($conn_id, $local_file, $remote_file);
            } else {
                if (ftp_put($conn_id, $remote_file, $local_file, FTP_BINARY)) {
                    // echo "  Berhasil mengunggah $local_file\n";
                } else {
                    echo "  ❌ Gagal mengunggah $local_file\n";
                }
            }
        }
    }
}

// Upload direct files
foreach($filesToUpload as $file) {
    if(file_exists($file)) {
        if(ftp_put($conn_id, "$baseDir/$file", $file, FTP_BINARY)) {
            echo "✅ Berhasil mengunggah $file\n";
        } else {
            echo "❌ Gagal mengunggah $file\n";
        }
    }
}

// Upload directories
foreach($localDirs as $dir) {
    if(is_dir($dir)) {
        uploadDirectory($conn_id, $dir, "$baseDir/$dir");
    }
}

ftp_close($conn_id);
echo "🎉 DEPLOY SELESAI!\n";
?>
