<?php

namespace App\Http\Controllers;

use App\Models\CodingProject;
use App\Services\PublicSitePublisher;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CodingProjectController extends Controller
{
    public function __construct(private readonly PublicSitePublisher $publisher) {}

    /**
     * Admin: List all coding projects
     */
    public function index(Request $request)
    {
        $projects = CodingProject::orderBy('order')->orderBy('year', 'desc')->get();
        return view('admin.coding_projects', compact('projects'));
    }

    /**
     * Admin: Store new coding project
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'image_url' => 'nullable|string|max:500',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'demo_url' => 'nullable|url|max:500',
            'github_url' => 'nullable|url|max:500',
            'technologies' => 'nullable|string',
            'category' => 'required|string|max:50',
            'type' => 'required|string|in:school,internship,personal',
            'year' => 'nullable|integer|min:2020|max:2030',
            'order' => 'integer|min:0',
            'architecture_diagram' => 'nullable|string',
            'database_schema' => 'nullable|string',
            'code_snippet' => 'nullable|string',
        ]);

        if ($request->hasFile('image_file')) {
            $validated['image_url'] = $this->storeOptimizedImage(
                $request->file('image_file'),
                $this->resolveStorageDisk(),
            );
        }

        // Convert comma-separated technologies to array
        if (!empty($validated['technologies'])) {
            $validated['technologies'] = array_map('trim', explode(',', $validated['technologies']));
        }

        CodingProject::create($validated);

        return back()->with('success', $this->publisher->trigger('coding_project_created'));
    }

    /**
     * Admin: Update coding project
     */
    public function update(Request $request, CodingProject $codingProject)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'image_url' => 'nullable|string|max:500',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'demo_url' => 'nullable|url|max:500',
            'github_url' => 'nullable|url|max:500',
            'technologies' => 'nullable|string',
            'category' => 'required|string|max:50',
            'type' => 'required|string|in:school,internship,personal',
            'year' => 'nullable|integer|min:2020|max:2030',
            'order' => 'integer|min:0',
            'architecture_diagram' => 'nullable|string',
            'database_schema' => 'nullable|string',
            'code_snippet' => 'nullable|string',
        ]);

        if ($request->hasFile('image_file')) {
            $diskName = $this->resolveStorageDisk();
            $newImageUrl = $this->storeOptimizedImage($request->file('image_file'), $diskName);
            $this->cleanupOldImage($codingProject->image_url, $diskName);
            $validated['image_url'] = $newImageUrl;
        }

        if (!empty($validated['technologies'])) {
            $validated['technologies'] = array_map('trim', explode(',', $validated['technologies']));
        }

        $codingProject->update($validated);

        return back()->with('success', $this->publisher->trigger('coding_project_updated'));
    }

    protected function storeOptimizedImage(UploadedFile $file, string $diskName): string
    {
        $extension = strtolower($file->getClientOriginalExtension());
        $prefix = 'coding_project_'.time().'_'.bin2hex(random_bytes(4));

        if (in_array($extension, ['jpg', 'jpeg', 'png']) && function_exists('imagewebp')) {
            $sourcePath = $file->getRealPath();
            $image = ($extension === 'png') ? imagecreatefrompng($sourcePath) : imagecreatefromjpeg($sourcePath);
            if ($image !== false) {
                if ($extension === 'png') {
                    imagepalettetotruecolor($image);
                    imagealphablending($image, true);
                    imagesavealpha($image, true);
                }
                $tempPath = tempnam(sys_get_temp_dir(), 'webp_');
                if ($tempPath !== false && imagewebp($image, $tempPath, 82)) {
                    imagedestroy($image);
                    $path = 'coding-projects/'.$prefix.'.webp';
                    $stream = fopen($tempPath, 'r');
                    $stored = Storage::disk($diskName)->put($path, $stream);
                    fclose($stream);
                    unlink($tempPath);

                    if (! $stored) {
                        throw new \RuntimeException('Coding project image could not be stored.');
                    }

                    return Storage::disk($diskName)->url($path);
                }
                imagedestroy($image);
                if (isset($tempPath) && $tempPath !== false && file_exists($tempPath)) {
                    unlink($tempPath);
                }
            }
        }

        $path = $file->storeAs('coding-projects', $prefix.'.'.$extension, $diskName);
        if ($path === false) {
            throw new \RuntimeException('Coding project image could not be stored.');
        }

        return Storage::disk($diskName)->url($path);
    }

    protected function resolveStorageDisk(): string
    {
        return config('filesystems.default') === 'supabase' ? 'supabase' : 'public';
    }

    protected function cleanupOldImage(?string $imageUrl, string $diskName): void
    {
        if (empty($imageUrl) || ! str_contains($imageUrl, '/coding-projects/')) {
            return;
        }

        $parsedPath = parse_url($imageUrl, PHP_URL_PATH);
        if (! $parsedPath) {
            return;
        }

        $storagePath = 'coding-projects/'.basename($parsedPath);
        if (Storage::disk($diskName)->exists($storagePath) && ! Storage::disk($diskName)->delete($storagePath)) {
            throw new \RuntimeException('Existing coding project image could not be removed.');
        }
    }

    /**
     * Admin: Delete coding project
     */
    public function destroy(Request $request, CodingProject $codingProject)
    {
        $this->cleanupOldImage($codingProject->image_url, $this->resolveStorageDisk());
        $codingProject->delete();
        return back()->with('success', $this->publisher->trigger('coding_project_deleted'));
    }
}
