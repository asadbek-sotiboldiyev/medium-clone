<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PagesController extends Controller
{
    public function home(){
        $users = User::all();
        return view('home', $data = [
            'users' => $users
        ]);
    }
}
