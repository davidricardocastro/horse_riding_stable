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
            'user_table'=>$user_table,
            //'slot_table'=>$slot_table
            ]);
    }


    public function user_data() {
        $user= \Auth::user();
        $reservation = \App\Reservation::select(
            'reservations.*',
            'slots.lesson_start',
            'slots.lesson_end',
            'slots.description as slot_description'
        )
        ->leftJoin('slots', 'reservations.slot_id', '=', 'slots.id')
        //->where('reservation.user_id', '=', $user->id)
        ->get();
        return view('user_data', [
            'user' => $user,
            'reservation' => $reservation
        ]);
    }

}



