<?php
$ftp_server = 'ftpupload.net';
$ftp_user = 'b16_42460542';
$ftp_pass = 'maygustosiraffakaybalqis';

$conn_id = ftp_connect($ftp_server);
ftp_login($conn_id, $ftp_user, $ftp_pass);
ftp_pasv($conn_id, true);

ftp_put($conn_id, "htdocs/unzip.php", "perfect_unzip.php", FTP_BINARY);
echo "✅ perfect_unzip.php berhasil diupload sebagai unzip.php.\n";
ftp_close($conn_id);
?>
