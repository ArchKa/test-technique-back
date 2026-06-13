<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function show(User $user) {
        return response()->json($user);
    }

    public function index() {
        $users = User::all();
        return response()->json($users);
    }
}
