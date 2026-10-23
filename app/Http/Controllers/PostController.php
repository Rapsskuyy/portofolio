<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PublicSitePublisher;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(private readonly PublicSitePublisher $publisher) {}

    /**
     * Admin: List all posts
     */
    public function index(Request $request)
    {
        $posts = Post::latest()->get();
        return view('admin.posts', compact('posts'));
    }

    /**
     * Admin: Store new post
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'content' => 'required|string',
            'category' => 'nullable|string|max:100',
            'is_published' => 'nullable|boolean',
        ]);

        $validated['is_published'] = $request->boolean('is_published');
        
        Post::create($validated);

        return back()->with('success', $this->publisher->markUnpublished());
    }

    /**
     * Admin: Update post
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'content' => 'required|string',
            'category' => 'nullable|string|max:100',
            'is_published' => 'nullable|boolean',
        ]);

        $validated['is_published'] = $request->boolean('is_published');
        $post->update($validated);

        return back()->with('success', $this->publisher->markUnpublished());
    }

    /**
     * Admin: Delete post
     */
    public function destroy(Request $request, Post $post)
    {
        $post->delete();
        return back()->with('success', $this->publisher->markUnpublished());
    }
}
