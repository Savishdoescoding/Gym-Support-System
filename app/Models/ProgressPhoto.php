<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgressPhoto extends Model
{
    protected $fillable = ['user_id', 'date', 'label', 'photo_path'];
}
