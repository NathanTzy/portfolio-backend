<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'image', 'technologies','link'];

    protected $casts = [
        'technologies' => 'array',
    ];
}
