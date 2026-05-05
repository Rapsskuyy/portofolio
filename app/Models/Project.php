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
    ];

    public function getTechnologiesArray()
    {
        if (is_null($this->technologies)) {
            return [];
        }
        return json_decode($this->technologies, true) ?? explode(',', $this->technologies);
    }
}
