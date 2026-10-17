<?php

$basePath = dirname(__DIR__);
$english = require $basePath . '/resources/lang/en/portfolio.php';
$indonesian = require $basePath . '/resources/lang/id/portfolio.php';

$flattenKeys = static function (array $translations, string $prefix = '') use (&$flattenKeys): array {
    $keys = [];
    foreach ($translations as $key => $value) {
        $path = $prefix . $key;
        if (is_array($value)) {
            $keys = [...$keys, ...$flattenKeys($value, $path . '.')];
        } else {
            $keys[] = $path;
        }
    }

    return $keys;
};

$englishKeys = $flattenKeys($english);
$indonesianKeys = $flattenKeys($indonesian);
sort($englishKeys);
sort($indonesianKeys);

$missingInIndonesian = array_values(array_diff($englishKeys, $indonesianKeys));
$missingInEnglish = array_values(array_diff($indonesianKeys, $englishKeys));

if ($missingInIndonesian || $missingInEnglish) {
    fwrite(STDERR, "Translation validation failed.\n");
    if ($missingInIndonesian) fwrite(STDERR, 'Missing in ID: ' . implode(', ', $missingInIndonesian) . "\n");
    if ($missingInEnglish) fwrite(STDERR, 'Missing in EN: ' . implode(', ', $missingInEnglish) . "\n");
    exit(1);
}

printf("Translation validation passed: %d identical EN/ID keys.\n", count($englishKeys));
