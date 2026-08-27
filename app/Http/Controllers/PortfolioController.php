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
    public function home(): View
    {
        $githubStats = \Illuminate\Support\Facades\Cache::remember('github_stats', 3600, function () {
            try {
                $response = \Illuminate\Support\Facades\Http::withHeaders([
                    'User-Agent' => 'RaffaPortfolio'
                ])->timeout(3)->get('https://api.github.com/users/Rapsskuyy');

                return $response->successful() ? $response->json() : null;
            } catch (\Exception $e) {
                return null;
            }
        });

        $projectsCount = \App\Models\Project::count();
        $codingProjectsCount = CodingProject::count();
        $testimonialsCount = Testimonial::where('is_approved', true)->count();

        return view('portfolio.home', [
            'githubStats' => $githubStats,
            'projectsCount' => $projectsCount,
            'codingProjectsCount' => $codingProjectsCount,
            'testimonialsCount' => $testimonialsCount,
        ]);
    }

    public function about(): View
    {
        $educations = Education::all();
        return view('portfolio.about', compact('educations'));
    }

    public function skills(): View
    {
        $softSkills = Skill::where('type', 'soft')->get();
        $hardSkills = Skill::where('type', 'hard')->get();
        return view('portfolio.skills', compact('softSkills', 'hardSkills'));
    }

    public function experience(): View
    {
        $projects = Project::all(); // Organisasi, MC, dll.
        $codingProjects = CodingProject::with('projectDetail')->orderBy('order')->orderBy('year', 'desc')->get();
        return view('portfolio.experience', compact('projects', 'codingProjects'));
    }

    public function guestbook(): View
    {
        $testimonials = Testimonial::where('is_approved', true)->latest()->take(6)->get();
        $posts = \App\Models\Post::where('is_published', true)->latest()->get();
        $mockApis = \App\Models\MockApi::where('is_active', true)->orderBy('id')->get();
        return view('portfolio.guestbook', compact('testimonials', 'posts', 'mockApis'));
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

