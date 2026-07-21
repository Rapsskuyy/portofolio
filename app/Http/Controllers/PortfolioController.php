<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Skill;
use App\Models\Project;
use App\Models\CodingProject;
use App\Models\Testimonial;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $educations = Education::all();
        $softSkills = Skill::where('type', 'soft')->get();
        $hardSkills = Skill::where('type', 'hard')->get();
        $projects = Project::all();
        $codingProjects = CodingProject::with('projectDetail')->orderBy('order')->orderBy('year', 'desc')->get();
        $testimonials = Testimonial::where('is_approved', true)->latest()->take(6)->get();
        $posts = \App\Models\Post::where('is_published', true)->latest()->get();
        $mockApis = \App\Models\MockApi::where('is_active', true)->orderBy('id')->get();

        // GitHub Stats (cached)
        $githubStats = \Illuminate\Support\Facades\Cache::remember('github_stats', 3600, function () {
            try {
                $username = 'Rapsskuyy';
                $url = "https://api.github.com/users/{$username}";
                $ctx = stream_context_create(['http' => ['header' => "User-Agent: RaffaPortfolio\r\n", 'timeout' => 3]]);
                $data = @file_get_contents($url, false, $ctx);
                return $data ? json_decode($data, true) : null;
            } catch (\Exception $e) {
                return null;
            }
        });

        return view('portfolio.index', [
            'educations'   => $educations,
            'softSkills'   => $softSkills,
            'hardSkills'   => $hardSkills,
            'projects'     => $projects,
            'codingProjects' => $codingProjects,
            'testimonials' => $testimonials,
            'posts'        => $posts,
            'mockApis'     => $mockApis,
            'githubStats'  => $githubStats,
        ]);
    }

    public function storeTestimonial(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'position' => 'nullable|string|max:100',
            'message' => 'required|string|min:10|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Testimonial::create($validated);

        return redirect()->back()->with('success', 'Terima kasih! Testimoni Anda sedang diproses.');
    }
}

