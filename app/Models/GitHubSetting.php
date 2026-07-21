<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GitHubSetting extends Model
{
    protected $table = 'github_settings';

    protected $fillable = [
        'github_username',
        'github_token',
        'show_stats',
        'show_repos',
        'cache_duration',
    ];

    protected $casts = [
        'show_stats' => 'boolean',
        'show_repos' => 'boolean',
        'cache_duration' => 'integer',
    ];

    public static function getSettings()
    {
        return static::first() ?? static::create([
            'github_username' => 'Rapsskuyy',
            'show_stats' => true,
            'show_repos' => true,
            'cache_duration' => 60,
        ]);
    }
}
