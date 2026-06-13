<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityData extends Model {
    use HasFactory;

    public $timestamps = false;

    protected $table = 'activity_data';

    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'activity_id',
        'point_in_time',
        'speed'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function activity(): BelongsTo {
        return $this->belongsTo(Activity::class);
    }
}
