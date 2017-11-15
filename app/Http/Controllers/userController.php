<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function user()
    {
        $userId = \Auth::id();
        $name = \Auth::user()->name;
        $email = \Auth::user()->email;
        $user_whole = \app\User::get();
        return view('user',['user_id'=>$userId,'user_name'=>$name,'user_email'=>$email,'user_whole'=>$user_whole]);
    }

    public function edit()
    {

    }
}
