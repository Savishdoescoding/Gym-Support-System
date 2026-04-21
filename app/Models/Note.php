<?php

/**
 * Note model for the 'notes' table. 
 * $fillable protects mass assignment for user_id, title, content, category fields.
 * belongsTo User relationship: $note->user or $user->notes.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['user_id', 'title', 'content', 'category'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
?>