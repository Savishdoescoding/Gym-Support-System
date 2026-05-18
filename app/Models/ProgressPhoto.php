<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $label
 * @property string $date
 * @property string $photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProgressPhoto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProgressPhoto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProgressPhoto query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProgressPhoto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProgressPhoto whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProgressPhoto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProgressPhoto whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProgressPhoto wherePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProgressPhoto whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProgressPhoto whereUserId($value)
 * @mixin \Eloquent
 */
class ProgressPhoto extends Model
{
    protected $fillable = ['user_id', 'date', 'label', 'photo_path'];
}
