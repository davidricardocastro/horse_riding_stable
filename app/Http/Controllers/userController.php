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
        return view('user',['user_id'=>$userId,'user_name'=>$name,'user_email'=>$email]);
    }
}
