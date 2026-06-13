<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Activity extends Model
{
    use HasFactory;

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'activity_data')
        ->withPivot('point_in_time', 'speed')
        ->withTimestamps();
    }
}
