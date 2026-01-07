<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{


    public function create()
    {
        return view ('auth.register');
    }
    public function register(StoreUserRequest $request)
    {
    

        $user= User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);

        Auth::login($user);

        return redirect('/');
    }
}
