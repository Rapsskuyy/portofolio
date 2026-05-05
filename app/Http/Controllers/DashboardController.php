<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Testimonial;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        // Proteksi sederhana: harus ada ?key=raffa di URL
        if ($request->query('key') !== 'raffa') {
            abort(403, 'Akses Ditolak. Gunakan kunci yang benar.');
        }

        $testimonials = Testimonial::latest()->get();
        return view('admin.dashboard', compact('testimonials'));
    }

    public function approve(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->update(['is_approved' => true]);
        return redirect()->back()->with('success', 'Testimoni berhasil di-publish!');
    }

    public function reject(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->update(['is_approved' => false]);
        return redirect()->back()->with('success', 'Testimoni berhasil di-unpublish!');
    }

    public function delete(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->delete();
        return redirect()->back()->with('success', 'Testimoni berhasil dihapus!');
    }
}
