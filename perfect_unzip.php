<?php
echo "Memulai proses ekstrak...\n";

$zip = new ZipArchive;
$res = $zip->open('laravel.zip');
if ($res === TRUE) {
    // Ekstrak semua file langsung ke htdocs/
    $zip->extractTo(__DIR__);
    $zip->close();
    
    // Bikin index.php untuk shared hosting
    $index = <<<EOD
<?php
use Illuminate\Http\Request;
define('LARAVEL_START', microtime(true));
if (file_exists(\$maintenance = __DIR__.'/storage/framework/maintenance.php')) {
    require \$maintenance;
}
require __DIR__.'/vendor/autoload.php';
\$app = require_once __DIR__.'/bootstrap/app.php';
\$app->bind('path.public', function() {
    return __DIR__;
});
\$app->handleRequest(Request::capture());
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
        $files = scandir('public');
        foreach ($files as $file) {
            if ($file != '.' && $file != '..' && $file != 'index.php' && $file != '.htaccess') {
                @rename("public/$file", $file);
            }
        }
    }

    echo "SUCCESS";
    @unlink('laravel.zip');
    @unlink(__FILE__);
} else {
    echo "FAILED";
}
?>
