<?php

namespace App\Http\Controllers;

use App\Models\Activity;

class ActivityController extends Controller
{
    public function show(Activity $activity) {
        return response()->json($activity);
    }
    public function index() {
        $activities = Activity::all();
        return response()->json($activities);
    }
}
