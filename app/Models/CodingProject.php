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
    ];

    protected $casts = [
        'technologies' => 'array',
        'year' => 'integer',
        'order' => 'integer',
    ];

    public function getTechnologiesArray()
    {
        if (is_null($this->technologies)) {
            return [];
        }
        return is_array($this->technologies) ? $this->technologies : json_decode($this->technologies, true);
    }
}
