<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Admin: List all posts
     */
    public function index(Request $request)
    {
        if ($request->query('key') !== 'raffa') {
            abort(403, 'Akses Ditolak. Gunakan kunci yang benar.');
        }

        $posts = Post::latest()->get();
        return view('admin.posts', compact('posts'));
    }

    /**
     * Admin: Store new post
     */
    public function store(Request $request)
    {
        if ($request->query('key') !== 'raffa') {
            abort(403, 'Akses Ditolak. Gunakan kunci yang benar.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'content' => 'required|string',
            'category' => 'nullable|string|max:100',
        ]);

        $validated['is_published'] = true;
        
        Post::create($validated);

        return back()->with('success', 'Blog post berhasil ditambahkan!');
    }

    /**
     * Admin: Update post
     */
    public function update(Request $request, Post $post)
    {
        if ($request->query('key') !== 'raffa') {
            abort(403, 'Akses Ditolak. Gunakan kunci yang benar.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'content' => 'required|string',
            'category' => 'nullable|string|max:100',
            'is_published' => 'boolean',
        ]);

        $post->update($validated);

        return back()->with('success', 'Blog post berhasil diperbarui!');
    }

    /**
     * Admin: Delete post
     */
    public function destroy(Request $request, Post $post)
    {
        if ($request->query('key') !== 'raffa') {
            abort(403, 'Akses Ditolak. Gunakan kunci yang benar.');
        }

        $post->delete();
        return back()->with('success', 'Blog post berhasil dihapus!');
    }
}
