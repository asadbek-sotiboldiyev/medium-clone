<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->first();

        if (empty($user))
            abort(404);

        return view('/user/show', $data = [
            'user' => $user
        ]);
    }
}
