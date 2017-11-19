<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function user()
    {
        $user_id = \Auth::id();
        $name = \Auth::user()->name;
        $email = \Auth::user()->email;
        $user_table = \app\User::get();
        $slot_table = \App\Slot::get();
        $reservation_table = \App\Reservation::get();
        return view('user',[
            'user_id'=>$user_id,
            'user_name'=>$name,
            'user_email'=>$email,
            'user_table'=>$user_table,

            'slot_table'=>$slot_table,

            'reservation_table'=>$reservation_table
            ]);
    }

    public function edit()
    {

    }
}
