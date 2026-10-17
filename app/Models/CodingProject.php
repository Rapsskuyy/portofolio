<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodingProject extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_url',
        'demo_url',
        'github_url',
        'technologies',
        'category',
        'year',
        'order',
        'architecture_diagram',
        'database_schema',
        'code_snippet',
        'type',
    ];

    protected $casts = [
        'technologies' => 'array',
        'year' => 'integer',
        'order' => 'integer',
    ];

    public function getTitleAttribute($value): string
    {
        return str_replace(['ÔÇö', 'â€“', 'â€”'], '-', (string) $value);
    }

    public function getTechnologiesArray()
    {
        if (is_null($this->technologies)) {
            return [];
        }
        return is_array($this->technologies) ? $this->technologies : json_decode($this->technologies, true);
    }

    public function projectDetail()
    {
        return $this->hasOne(ProjectDetail::class);
    }

    public function getFormattedImageUrlAttribute(): string
    {
        if (empty($this->image_url)) {
            return asset('images/logo.webp');
        }

        if (str_starts_with($this->image_url, 'http://') || str_starts_with($this->image_url, 'https://')) {
            return $this->image_url;
        }

        if (str_starts_with($this->image_url, 'storage/')) {
            return asset($this->image_url);
        }

        if (str_starts_with($this->image_url, 'images/')) {
            return asset($this->normalizeLocalImagePath($this->image_url));
        }

        if (str_starts_with($this->image_url, 'coding-projects/')) {
            return asset('images/' . $this->normalizeLocalImagePath($this->image_url));
        }

        return asset('images/coding-projects/' . $this->normalizeLocalImagePath($this->image_url));
    }

    private function normalizeLocalImagePath(string $path): string
    {
        return preg_replace('/\.(?:jpe?g|png)$/i', '.webp', $path) ?? $path;
    }
}
