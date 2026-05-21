<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Skill;
use App\Models\Project;
use App\Models\CodingProject;
use App\Models\Testimonial;
use App\Models\GuestBook;
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
        $codingProjects = CodingProject::orderBy('order')->orderBy('year', 'desc')->get();
        $testimonials = Testimonial::where('is_approved', true)
            ->latest()
            ->take(6)
            ->get();

        return view('portfolio.index', [
            'educations' => $educations,
            'softSkills' => $softSkills,
            'hardSkills' => $hardSkills,
            'projects' => $projects,
            'codingProjects' => $codingProjects,
            'testimonials' => $testimonials,
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

