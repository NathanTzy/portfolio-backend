<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name','details'];

    protected $casts = [
        'details' => 'array',
    ];
}