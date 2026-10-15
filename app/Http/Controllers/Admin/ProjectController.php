<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order')->orderBy('id', 'asc')->get();

        return view('admin.projects', compact('projects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'image_url' => 'nullable|string|max:500',
            'project_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'technologies' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_visible' => 'nullable|boolean',
        ]);

        $diskName = $this->resolveStorageDisk();

        if ($request->hasFile('image')) {
            $validated['image_url'] = $this->storeOptimizedImage($request->file('image'), $diskName);
        }

        $validated['is_visible'] = $request->boolean('is_visible', true);
        $validated['order'] = $validated['order'] ?? 0;

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project galeri berhasil ditambahkan.');
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'image_url' => 'nullable|string|max:500',
            'project_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'technologies' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_visible' => 'nullable|boolean',
        ]);

        $diskName = $this->resolveStorageDisk();

        if ($request->hasFile('image')) {
            $this->cleanupOldImage($project->image_url, $diskName);
            $validated['image_url'] = $this->storeOptimizedImage($request->file('image'), $diskName);
        }

        $validated['is_visible'] = $request->boolean('is_visible');
        $validated['order'] = $validated['order'] ?? 0;

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project galeri berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        $diskName = $this->resolveStorageDisk();
        $this->cleanupOldImage($project->image_url, $diskName);

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project galeri berhasil dihapus.');
    }

    /**
     * Store and optionally optimize uploaded image to WebP format.
     */
    protected function storeOptimizedImage($file, string $diskName): string
    {
        $extension = strtolower($file->getClientOriginalExtension());
        $prefix = 'project_'.time().'_'.bin2hex(random_bytes(4));

        if (in_array($extension, ['jpg', 'jpeg', 'png']) && function_exists('imagewebp')) {
            $sourcePath = $file->getRealPath();
            $image = ($extension === 'png') ? @imagecreatefrompng($sourcePath) : @imagecreatefromjpeg($sourcePath);
            if ($image !== false) {
                if ($extension === 'png') {
                    imagepalettetotruecolor($image);
                    imagealphablending($image, true);
                    imagesavealpha($image, true);
                }
                $tempPath = tempnam(sys_get_temp_dir(), 'webp_');
                if (imagewebp($image, $tempPath, 82)) {
                    imagedestroy($image);
                    $filename = $prefix.'.webp';
                    $path = 'projects/'.$filename;
                    $stream = fopen($tempPath, 'r');
                    $stored = Storage::disk($diskName)->put($path, $stream);
                    if (is_resource($stream)) {
                        fclose($stream);
                    }
                    @unlink($tempPath);
                    if ($stored) {
                        return Storage::disk($diskName)->url($path);
                    }
                } else {
                    imagedestroy($image);
                    @unlink($tempPath);
                }
            }
        }

        $filename = $prefix.'.'.$file->getClientOriginalExtension();
        $path = $file->storeAs('projects', $filename, $diskName);

        if ($path === false) {
            throw new \RuntimeException('Project image could not be stored.');
        }

        return Storage::disk($diskName)->url($path);
    }

    protected function resolveStorageDisk(): string
    {
        return config('filesystems.default') === 'supabase' ? 'supabase' : 'public';
    }

    protected function cleanupOldImage(?string $imageUrl, string $diskName): void
    {
        if (empty($imageUrl)) {
            return;
        }

        if (str_contains($imageUrl, '/storage/projects/') || str_contains($imageUrl, '/object/public/')) {
            $parsedPath = parse_url($imageUrl, PHP_URL_PATH);
            if ($parsedPath) {
                $filename = basename($parsedPath);
                $storagePath = 'projects/'.$filename;
                if (Storage::disk($diskName)->exists($storagePath) && ! Storage::disk($diskName)->delete($storagePath)) {
                    throw new \RuntimeException('Existing project image could not be removed.');
                }
            }
        }
    }
}
