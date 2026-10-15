<?php

namespace App\Http\Controllers;

use App\Models\CodingProject;
use Illuminate\Http\Request;

class CodingProjectController extends Controller
{
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
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5120',
            'demo_url' => 'nullable|string|max:500',
            'github_url' => 'nullable|string|max:500',
            'technologies' => 'nullable|string',
            'category' => 'required|string|max:50',
            'type' => 'required|string|in:school,internship,personal',
            'year' => 'nullable|integer|min:2020|max:2030',
            'order' => 'integer|min:0',
            'architecture_diagram' => 'nullable|string',
            'database_schema' => 'nullable|string',
            'code_snippet' => 'nullable|string',
        ]);

        // Handle Image File Upload
        if ($request->hasFile('image_file')) {
            $validated['image_url'] = $this->storeOptimizedImage($request->file('image_file'));
        }

        // Convert comma-separated technologies to array
        if (!empty($validated['technologies'])) {
            $validated['technologies'] = array_map('trim', explode(',', $validated['technologies']));
        }

        CodingProject::create($validated);

        return back()->with('success', 'Project berhasil ditambahkan!');
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
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5120',
            'demo_url' => 'nullable|string|max:500',
            'github_url' => 'nullable|string|max:500',
            'technologies' => 'nullable|string',
            'category' => 'required|string|max:50',
            'type' => 'required|string|in:school,internship,personal',
            'year' => 'nullable|integer|min:2020|max:2030',
            'order' => 'integer|min:0',
            'architecture_diagram' => 'nullable|string',
            'database_schema' => 'nullable|string',
            'code_snippet' => 'nullable|string',
        ]);

        // Handle Image File Upload
        if ($request->hasFile('image_file')) {
            $validated['image_url'] = $this->storeOptimizedImage($request->file('image_file'));
        }

        if (!empty($validated['technologies'])) {
            $validated['technologies'] = array_map('trim', explode(',', $validated['technologies']));
        }

        $codingProject->update($validated);

        return back()->with('success', 'Project berhasil diperbarui!');
    }

    /**
     * Store and optionally optimize uploaded image to WebP format.
     */
    protected function storeOptimizedImage($file): string
    {
        $destinationPath = public_path('images/coding-projects');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        $extension = strtolower($file->getClientOriginalExtension());
        $basename = 'project_' . time() . '_' . uniqid();

        if (in_array($extension, ['jpg', 'jpeg', 'png']) && function_exists('imagewebp')) {
            $sourcePath = $file->getRealPath();
            $image = ($extension === 'png') ? @imagecreatefrompng($sourcePath) : @imagecreatefromjpeg($sourcePath);
            if ($image !== false) {
                if ($extension === 'png') {
                    imagepalettetotruecolor($image);
                    imagealphablending($image, true);
                    imagesavealpha($image, true);
                }
                $targetFile = $basename . '.webp';
                $targetPath = $destinationPath . DIRECTORY_SEPARATOR . $targetFile;
                if (imagewebp($image, $targetPath, 82)) {
                    imagedestroy($image);
                    return 'images/coding-projects/' . $targetFile;
                }
                imagedestroy($image);
            }
        }

        $filename = $basename . '.' . $extension;
        $file->move($destinationPath, $filename);
        return 'images/coding-projects/' . $filename;
    }

    /**
     * Admin: Delete coding project
     */
    public function destroy(Request $request, CodingProject $codingProject)
    {
        $codingProject->delete();
        return back()->with('success', 'Project berhasil dihapus!');
    }
}
