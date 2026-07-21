<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectDetail;
use App\Models\CodingProject;
use Illuminate\Http\Request;

class ProjectDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if ($request->query('key') !== 'raffa') {
                abort(403, 'Unauthorized');
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $projects = CodingProject::with('projectDetail')->orderBy('order')->get();
        return view('admin.project-details.index', compact('projects'));
    }

    public function edit(Request $request, CodingProject $codingProject)
    {
        $detail = $codingProject->projectDetail ?? new ProjectDetail();
        return view('admin.project-details.edit', compact('codingProject', 'detail'));
    }

    public function update(Request $request, CodingProject $codingProject)
    {
        $validated = $request->validate([
            'system_architecture' => 'nullable|string',
            'database_schema' => 'nullable|array',
            'code_snippets' => 'nullable|array',
            'technical_specs' => 'nullable|string',
        ]);

        $detail = $codingProject->projectDetail()->updateOrCreate(
            ['coding_project_id' => $codingProject->id],
            $validated
        );

        return redirect()->route('admin.project-details.index', ['key' => 'raffa'])
            ->with('success', 'Project details updated successfully.');
    }
}
