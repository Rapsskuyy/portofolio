<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Skill;
use App\Models\Project;
use App\Models\CodingProject;
use App\Models\Testimonial;
use App\Models\Post;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PortfolioController extends Controller
{
    public function index(): Response
    {
        $educations = Education::all();
        $softSkills = Skill::where('type', 'soft')->get();
        $hardSkills = Skill::where('type', 'hard')->get();
        $projects = Project::whereRaw('is_visible IS TRUE')->orderBy('order')->orderBy('id', 'asc')->get();
        $codingProjects = CodingProject::with('projectDetail')->orderBy('order')->orderBy('year', 'desc')->get();

        return response()->view('portfolio.index', [
            'educations'     => $educations,
            'softSkills'     => $softSkills,
            'hardSkills'     => $hardSkills,
            'projects'       => $projects,
            'codingProjects' => $codingProjects,
        ])->header('Cache-Control', 'public, max-age=0, s-maxage=60, stale-while-revalidate=300');
    }

    public function home(): Response
    {
        return $this->index();
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
        $projects = Project::whereRaw('is_visible IS TRUE')->orderBy('order')->orderBy('id', 'asc')->get();
        $codingProjects = CodingProject::with('projectDetail')->orderBy('order')->orderBy('year', 'desc')->get();
        return view('portfolio.experience', compact('projects', 'codingProjects'));
    }

    public function guestbook(): View
    {
        $testimonials = Testimonial::whereRaw('is_approved IS TRUE')->latest()->take(6)->get();
        $posts = Post::whereRaw('is_published IS TRUE')->latest()->get();
        return view('portfolio.guestbook', compact('testimonials', 'posts'));
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
