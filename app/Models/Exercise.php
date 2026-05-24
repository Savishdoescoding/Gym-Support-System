<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'name',
        'category',
        'level',
        'equipment',
        'force',
        'mechanic',
        'primary_muscles',
        'secondary_muscles',
        'instructions',
    ];

    protected $casts = [
        'primary_muscles'   => 'array',
        'secondary_muscles' => 'array',
        'instructions'      => 'array',
    ];
}
