<?php

// Quick Image Test Script
// Run: php test_images.php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Project;

echo "🔍 Testing Image Configuration...\n\n";

// Test 1: Check profile image
echo "📸 Test 1: Profile Image\n";
$profilePath = 'public/images/profile/profilrappa.jpeg';
if (file_exists($profilePath)) {
    echo "   ✅ Profile image exists: {$profilePath}\n";
    echo "   📏 Size: " . round(filesize($profilePath) / 1024, 2) . " KB\n";
} else {
    echo "   ❌ Profile image NOT found: {$profilePath}\n";
}
echo "\n";

// Test 2: Check project images
echo "📸 Test 2: Project Images\n";
$projects = Project::all();
echo "   Found {$projects->count()} projects in database\n\n";

foreach ($projects as $project) {
    echo "   Project: {$project->title}\n";
    echo "   DB Path: {$project->image_url}\n";
    
    // Extract filename
    $filename = basename($project->image_url);
    $filePath = "public/images/projects/{$filename}";
    
    if (file_exists($filePath)) {
        echo "   ✅ File exists: {$filePath}\n";
        echo "   📏 Size: " . round(filesize($filePath) / 1024, 2) . " KB\n";
    } else {
        echo "   ❌ File NOT found: {$filePath}\n";
    }
    echo "\n";
}

// Test 3: Check URLs
echo "🌐 Test 3: URL Access\n";
echo "   Profile URL: http://localhost:8000/images/profile/profilrappa.jpeg\n";
echo "   Project URL: http://localhost:8000/images/projects/bulan_bahasa.jpg\n";
echo "\n";

// Summary
echo "📊 Summary:\n";
$profileExists = file_exists('public/images/profile/profilrappa.jpeg');
$projectsCount = 0;
foreach ($projects as $project) {
    $filename = basename($project->image_url);
    if (file_exists("public/images/projects/{$filename}")) {
        $projectsCount++;
    }
}

echo "   Profile Image: " . ($profileExists ? "✅ OK" : "❌ Missing") . "\n";
echo "   Project Images: {$projectsCount}/{$projects->count()} OK\n";
echo "\n";

if ($profileExists && $projectsCount === $projects->count()) {
    echo "🎉 All images configured correctly!\n";
    echo "🚀 Run: php artisan serve\n";
    echo "🌐 Open: http://localhost:8000\n";
} else {
    echo "⚠️  Some images are missing. Check the paths above.\n";
}
