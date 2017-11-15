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
        $user_table = \app\User::get();
        //$slot_table = \app\slot::get();
        return view('user',[
            'user_id'=>$userId,
            'user_name'=>$name,
            'user_email'=>$email,
            'user_table'=>$user_table
                /*,'slot_table'=>$slot_table*/
            ]);
    }

    public function edit()
    {

    }
}
