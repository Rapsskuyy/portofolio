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

ftp_put($conn_id, 'htdocs/unzip.php', 'perfect_unzip.php', FTP_BINARY);
echo "✅ perfect_unzip.php berhasil diupload sebagai unzip.php.\n";
ftp_close($conn_id);
