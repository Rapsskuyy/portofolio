<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MockApi extends Model
{
    protected $fillable = [
        'path',
        'method',
        'response_body',
        'description',
        'is_active',
    ];

    protected $casts = [
        'response_body' => 'array',
        'is_active' => 'boolean',
    ];
}
