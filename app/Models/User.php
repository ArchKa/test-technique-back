<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email'
    ];

    public function activities(): BelongsToMany {
        return $this->belongsToMany(Activity::class, 'activity_data')
        ->withPivot('point_in_time', 'speed')
        ->withTimestamps();
    }
}
