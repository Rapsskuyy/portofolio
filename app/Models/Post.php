<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'category',
        'is_published',
        'views_count',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'views_count' => 'integer',
    ];

    protected static function booted(): void
    {
        static::saving(function (Post $post) {
            if (empty($post->slug) || $post->isDirty('title')) {
                $post->slug = static::generateUniqueSlug($post->title, $post->getKey());
            }
        });
    }

    protected static function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::limit(Str::slug($title) ?: 'post', 240, '');
        $slug = $base;
        $suffix = 2;

        while (static::query()
            ->where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->whereKeyNot($ignoreId))
            ->exists()) {
            $slug = Str::limit($base, 255 - strlen((string) $suffix) - 1, '').'-'.$suffix;
            $suffix++;
        }

        return $slug;
    }

    /**
     * Get excerpt from content
     */
    public function getExcerptAttribute(): string
    {
        return Str::limit(strip_tags($this->content), 150);
    }

    public function getSafeContentAttribute(): string
    {
        $content = strip_tags($this->content, '<p><br><strong><b><em><i><ul><ol><li><a><h2><h3><h4><blockquote><pre><code>');
        $content = preg_replace('/\s+on[a-z]+\s*=\s*(?:"[^"]*"|\'[^\']*\'|[^\s>]+)/i', '', $content) ?? '';

        return preg_replace_callback(
            '/\s+href\s*=\s*(?:"([^"]*)"|\'([^\']*)\'|([^\s>]+))/i',
            function (array $matches): string {
                $href = html_entity_decode($matches[1] ?: $matches[2] ?: $matches[3], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                $scheme = strtolower((string) parse_url($href, PHP_URL_SCHEME));

                if ($scheme !== '' && ! in_array($scheme, ['http', 'https', 'mailto'], true)) {
                    return '';
                }

                return ' href="'.e($href).'" rel="noopener noreferrer"';
            },
            $content,
        ) ?? '';
    }
}
