<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GitHubSetting;
use Illuminate\Http\Request;

class GitHubSettingController extends Controller
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
        $settings = GitHubSetting::getSettings();
        return view('admin.github-settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'github_username' => 'nullable|string|max:100',
            'github_token' => 'nullable|string',
            'show_stats' => 'boolean',
            'show_repos' => 'boolean',
            'cache_duration' => 'integer|min:5|max:1440',
        ]);

        $settings = GitHubSetting::getSettings();
        $settings->update($validated);

        return redirect()->route('admin.github-settings.index', ['key' => 'raffa'])
            ->with('success', 'GitHub settings updated successfully.');
    }
}
