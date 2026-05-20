<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkoutLog extends Model
{
    protected $fillable = [
        'user_id',
        'exercise_name',
        'muscle',
        'equipment',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
