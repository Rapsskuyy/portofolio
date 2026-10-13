<?php

$ftp_server = getenv('FTP_HOST');
$ftp_user = getenv('FTP_USERNAME');
$ftp_pass = getenv('FTP_PASSWORD');

if (! $ftp_server || ! $ftp_user || ! $ftp_pass) {
    fwrite(STDERR, "Set FTP_HOST, FTP_USERNAME, and FTP_PASSWORD before running this script.\n");
    exit(1);
}

$conn_id = ftp_connect($ftp_server);
ftp_login($conn_id, $ftp_user, $ftp_pass);
ftp_pasv($conn_id, true);

echo "Uploading laravel_lite.zip...\n";
if (ftp_put($conn_id, 'htdocs/laravel_lite.zip', 'laravel_lite.zip', FTP_BINARY)) {
    echo "✅ laravel_lite.zip diupload!\n";
} else {
    echo "❌ Gagal upload laravel_lite.zip!\n";
}

echo "Uploading unzip_lite.php...\n";
if (ftp_put($conn_id, 'htdocs/unzip.php', 'unzip_lite.php', FTP_BINARY)) {
    echo "✅ unzip_lite.php diupload sebagai unzip.php!\n";
} else {
    echo "❌ Gagal upload unzip_lite.php!\n";
}

ftp_close($conn_id);
