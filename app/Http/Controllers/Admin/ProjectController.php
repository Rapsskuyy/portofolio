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
            $file = $request->file('image');
            $filename = 'project_'.time().'_'.bin2hex(random_bytes(4)).'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('projects', $filename, $diskName);

            if ($path === false) {
                throw new \RuntimeException('Project image could not be stored.');
            }

            $validated['image_url'] = Storage::disk($diskName)->url($path);
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

            $file = $request->file('image');
            $filename = 'project_'.time().'_'.bin2hex(random_bytes(4)).'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('projects', $filename, $diskName);

            if ($path === false) {
                throw new \RuntimeException('Project image could not be stored.');
            }

            $validated['image_url'] = Storage::disk($diskName)->url($path);
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
