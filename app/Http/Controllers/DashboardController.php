<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Testimonial;
use App\Services\PublicSitePublisher;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function __construct(private readonly PublicSitePublisher $publisher) {}

    public function index(Request $request): View
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.dashboard', compact('testimonials'));
    }

    public function approve(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->update(['is_approved' => true]);
        return redirect()->back()->with('success', $this->publisher->trigger('testimonial_approved'));
    }

    public function reject(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->update(['is_approved' => false]);
        return redirect()->back()->with('success', $this->publisher->trigger('testimonial_rejected'));
    }

    public function delete(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->delete();
        return redirect()->back()->with('success', $this->publisher->trigger('testimonial_deleted'));
    }
}
