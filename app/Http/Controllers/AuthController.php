<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function loginView(){
        return view('auth/login');
    }

    public function login(Request $request){
        $validated_data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt(request()->only(['username', 'password']))){
            return redirect('/');
        }
        return redirect()->back()->withErrors(['user' => 'User not found']);
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function registerView(){
        return view('auth/register');
    }

    public function register(Request $request){
        $validated_data = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password1' => 'required',
            'password2' => 'required',
        ]);

        $validated_data['password'] = $validated_data['password1'];
        $user = User::create($validated_data);
        $user->save();

        return redirect()->route('loginView');
    }
}
