<?php
$ftp_server = 'ftpupload.net';
$ftp_user = 'b16_42460542';
$ftp_pass = 'maygustosiraffakaybalqis';

$conn_id = ftp_connect($ftp_server);
ftp_login($conn_id, $ftp_user, $ftp_pass);
ftp_pasv($conn_id, true);

echo "Uploading laravel_lite.zip...\n";
if (ftp_put($conn_id, "htdocs/laravel_lite.zip", "laravel_lite.zip", FTP_BINARY)) {
    echo "✅ laravel_lite.zip diupload!\n";
} else {
    echo "❌ Gagal upload laravel_lite.zip!\n";
}

echo "Uploading unzip_lite.php...\n";
if (ftp_put($conn_id, "htdocs/unzip.php", "unzip_lite.php", FTP_BINARY)) {
    echo "✅ unzip_lite.php diupload sebagai unzip.php!\n";
} else {
    echo "❌ Gagal upload unzip_lite.php!\n";
}

ftp_close($conn_id);
?>
