<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ActivityDataController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/activities/{activity}', [ActivityController::class, 'show'])
    ->missing(function (Request $request) {
        $id = $request->route('activity'); 

        return response()->json([
            'message' => "L'activité avec l'ID {$id} n'existe pas."
        ], 404);
    }
);

Route::get('/activities', [ActivityController::class, 'index']);

Route::get('/users/{user}', [UserController::class, 'show'])
    ->missing(function (Request $request) {
        $id = $request->route('user'); 

        return response()->json([
            'message' => "L'activité avec l'ID {$id} n'existe pas."
        ], 404);
    }
);

Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{user}/activities/{activity}', [ActivityDataController::class, 'show'])
    ->missing(function (Request $request) {
        $user = $request->route('user');
        $activity = $request->route('activity');

        if (!($user instanceof User)) {
            return response()->json([
                'error' => 'User Not Found',
                'message' => "L'utilisateur avec l'ID {$user} n'existe pas."
            ], 404);
        }

        return response()->json([
            'error' => 'Activity Not Found',
            'message' => "L'activité avec l'ID {$activity} n'existe pas."
        ], 404);
    });
