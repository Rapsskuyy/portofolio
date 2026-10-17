<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_url',
        'project_url',
        'github_url',
        'technologies',
        'is_visible',
        'order',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
        'order' => 'integer',
    ];

    public function getTitleAttribute($value): string
    {
        return str_replace(['ÔÇö', 'â€“', 'â€”'], '-', (string) $value);
    }

    public function scopeVisible($query)
    {
        return $query->whereRaw('is_visible IS TRUE');
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

        if (str_starts_with($this->image_url, 'projects/')) {
            return asset('images/' . $this->normalizeLocalImagePath($this->image_url));
        }

        return asset('images/projects/' . $this->normalizeLocalImagePath($this->image_url));
    }

    private function normalizeLocalImagePath(string $path): string
    {
        return preg_replace('/\.(?:jpe?g|png)$/i', '.webp', $path) ?? $path;
    }

    public function getTechnologiesArray()
    {
        if (is_null($this->technologies)) {
            return [];
        }
        return json_decode($this->technologies, true) ?? explode(',', $this->technologies);
    }
}
