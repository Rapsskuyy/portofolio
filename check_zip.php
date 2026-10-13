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

$files = ftp_rawlist($conn_id, 'htdocs/');
print_r($files);

$size = ftp_size($conn_id, 'htdocs/laravel.zip');
echo "Size of laravel.zip: $size bytes\n";

ftp_close($conn_id);
