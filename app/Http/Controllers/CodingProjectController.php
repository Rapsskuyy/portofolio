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
        if ($request->query('key') !== 'raffa') {
            abort(403, 'Akses Ditolak. Gunakan kunci yang benar.');
        }

        $projects = CodingProject::orderBy('order')->orderBy('year', 'desc')->get();
        return view('admin.coding_projects', compact('projects'));
    }

    /**
     * Admin: Store new coding project
     */
    public function store(Request $request)
    {
        if ($request->query('key') !== 'raffa') {
            abort(403, 'Akses Ditolak. Gunakan kunci yang benar.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'image_url' => 'nullable|string|max:500',
            'demo_url' => 'nullable|string|max:500',
            'github_url' => 'nullable|string|max:500',
            'technologies' => 'nullable|string',
            'category' => 'required|string|max:50',
            'year' => 'nullable|integer|min:2020|max:2030',
            'order' => 'integer|min:0',
            'architecture_diagram' => 'nullable|string',
            'database_schema' => 'nullable|string',
            'code_snippet' => 'nullable|string',
        ]);

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
        if ($request->query('key') !== 'raffa') {
            abort(403, 'Akses Ditolak. Gunakan kunci yang benar.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'image_url' => 'nullable|string|max:500',
            'demo_url' => 'nullable|string|max:500',
            'github_url' => 'nullable|string|max:500',
            'technologies' => 'nullable|string',
            'category' => 'required|string|max:50',
            'year' => 'nullable|integer|min:2020|max:2030',
            'order' => 'integer|min:0',
            'architecture_diagram' => 'nullable|string',
            'database_schema' => 'nullable|string',
            'code_snippet' => 'nullable|string',
        ]);

        if (!empty($validated['technologies'])) {
            $validated['technologies'] = array_map('trim', explode(',', $validated['technologies']));
        }

        $codingProject->update($validated);

        return back()->with('success', 'Project berhasil diperbarui!');
    }

    /**
     * Admin: Delete coding project
     */
    public function destroy(Request $request, CodingProject $codingProject)
    {
        if ($request->query('key') !== 'raffa') {
            abort(403, 'Akses Ditolak. Gunakan kunci yang benar.');
        }

        $codingProject->delete();
        return back()->with('success', 'Project berhasil dihapus!');
    }
}
