<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slot;
class userController extends Controller
{
    //
    public function user()
    {
        $userId = \Auth::id();
        $name = \Auth::user()->name;
        $email = \Auth::user()->email;
        $user_table = \App\User::get();
        $slot_table = \App\slot::get();
        return view('user',[
            'user_id'=>$userId,
            'user_name'=>$name,
            'user_email'=>$email,
            'user_table'=>$user_table
            ,'slot_table'=>$slot_table
            ]);
    }


}
