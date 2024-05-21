<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->first();

        if (empty($user))
            abort(404);
        $user_articles = Article::select()
            ->where('user_id', $user->id)
            ->get();

        return view('/user/show', $data = [
            'user' => $user,
            'user_articles' => $user_articles
        ]);
    }
}
