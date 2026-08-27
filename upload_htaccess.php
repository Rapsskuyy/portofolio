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

ftp_put($conn_id, "htdocs/.htaccess", ".htaccess", FTP_BINARY);
echo "✅ .htaccess uploaded.\n";
ftp_close($conn_id);
?>
