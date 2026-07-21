<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    protected $fillable = [
        'coding_project_id',
        'system_architecture',
        'database_schema',
        'code_snippets',
        'technical_specs',
    ];

    protected $casts = [
        'database_schema' => 'array',
        'code_snippets' => 'array',
    ];

    public function codingProject()
    {
        return $this->belongsTo(CodingProject::class);
    }
}
