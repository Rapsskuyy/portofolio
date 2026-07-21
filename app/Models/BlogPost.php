<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'category',
        'tags',
        'featured_image',
        'is_published',
        'published_at',
        'views',
    ];

    protected $casts = [
        'tags' => 'array',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'views' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function publishedPosts()
    {
        return $this->where('is_published', true)
                    ->whereNotNull('published_at')
                    ->orderBy('published_at', 'desc');
    }
}
