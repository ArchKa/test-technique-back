<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Activity;
use App\Models\ActivityData;

class ActivityDataController extends Controller
{

    public function show(User $user, Activity $activity)
    {
        $metrics = ActivityData::where('user_id', $user->id)
                               ->where('activity_id', $activity->id)
                               ->get();

        if ($metrics->isEmpty()) {
            return response()->json([
                'error' => 'Link Not Found',
                'message' => "L'activité {$activity->id} existe, mais n'est pas associée à l'utilisateur {$user->id}."
            ], 400);
        }

        $formattedData = $metrics->map(function ($item) {
            return [
                'point_in_time' => $item->point_in_time,
                'speed'         => $item->speed,
            ];
        });

        $averageSpeed = $metrics->avg('speed');

        return response()->json([
            'user'          => $user,
            'activity'      => $activity,
            'average_speed' => round($averageSpeed, 2),
            'data'          => $formattedData
        ]);
    }
}