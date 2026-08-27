<?php
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

$conn_id = ftp_connect($ftp_server);
ftp_login($conn_id, $ftp_user, $ftp_pass);
ftp_pasv($conn_id, true);

echo "Mengunggah custom_index.php...\n";
ftp_put($conn_id, "htdocs/index.php", "custom_index.php", FTP_BINARY);

function uploadDirectory($conn_id, $local_dir, $remote_dir) {
    @ftp_mkdir($conn_id, $remote_dir);
    $files = scandir($local_dir);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            $local_file = $local_dir . '/' . $file;
            $remote_file = $remote_dir . '/' . $file;
            if (is_dir($local_file)) {
                uploadDirectory($conn_id, $local_file, $remote_file);
            } else {
                ftp_put($conn_id, $remote_file, $local_file, FTP_BINARY);
            }
        }
    }
}

echo "Mengunggah assets public ke root...\n";
uploadDirectory($conn_id, "public/build", "htdocs/build");
uploadDirectory($conn_id, "public/css", "htdocs/css");
uploadDirectory($conn_id, "public/images", "htdocs/images");

echo "✅ Selesai memperbaiki struktur direktori dan index.php!\n";
ftp_close($conn_id);
?>
