<?php

/**
 * Note model for the 'notes' table. 
 * $fillable protects mass assignment for user_id, title, content, category fields.
 * belongsTo User relationship: $note->user or $user->notes.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string|null $title
 * @property string $content
 * @property string|null $category
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Note newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Note newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Note query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Note whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Note whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Note whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Note whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Note whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Note whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Note whereUserId($value)
 * @mixin \Eloquent
 */
class Note extends Model
{
    protected $fillable = ['user_id', 'title', 'content', 'category'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
?>