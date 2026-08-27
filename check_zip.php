<?php
$ftp_server = 'ftpupload.net';
$ftp_user = 'b16_42460542';
$ftp_pass = 'maygustosiraffakaybalqis';

$conn_id = ftp_connect($ftp_server);
ftp_login($conn_id, $ftp_user, $ftp_pass);
ftp_pasv($conn_id, true);

$files = ftp_rawlist($conn_id, "htdocs/");
print_r($files);

$size = ftp_size($conn_id, "htdocs/laravel.zip");
echo "Size of laravel.zip: $size bytes\n";

ftp_close($conn_id);
?>
