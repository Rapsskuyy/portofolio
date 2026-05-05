<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'type',
        'proficiency',
    ];

    public function isSoftSkill()
    {
        return $this->type === 'soft';
    }

    public function isHardSkill()
    {
        return $this->type === 'hard';
    }
}
