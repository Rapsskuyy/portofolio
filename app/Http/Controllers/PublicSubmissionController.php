<?php

namespace App\Http\Controllers;

use App\Models\GuestBook;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PublicSubmissionController extends Controller
{
    public function storeTestimonial(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'position' => 'nullable|string|max:100',
            'message' => 'required|string|min:10|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Testimonial::create($validated);

        return response()->json([
            'message' => 'Terima kasih. Testimoni Anda sedang menunggu moderasi.',
        ], 201);
    }

    public function storeGuestbook(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'nullable|email|max:100',
            'message' => 'required|string|max:1000',
        ]);

        GuestBook::create($validated);

        return response()->json([
            'message' => 'Pesan pribadi Anda sudah diterima.',
        ], 201);
    }
}
