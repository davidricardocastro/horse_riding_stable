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

    // USER DATA DISPLAY, IT SHOULD SHOW ONLY THE SPECIFIC USER RESERVATION
    public function user_data() {
        $user= \Auth::user();
        $reservations = \App\Reservation::select(
            'reservations.*',
            'slots.lesson_start',
            'slots.lesson_end',
            'slots.description as slot_description'
        )
        ->leftJoin('slots', 'reservations.slot_id', '=', 'slots.id')
        ->where('reservations.user_id', '=', $user->id)
        ->where('slots.lesson_start', '>', date('Y-m-d H:i:s'))
        ->get();
        return view('user_data', [
            'user' => $user,
            'reservations' => $reservations
        ]);
    }

    // CANCEL RESERVATION
    public function cancel_reservation($id)
    {      
        
        $reservation = \App\reservation::findOrFail($id);
        $slot = \App\slot::findOrFail($reservation->slot_id);
        // this variable should retrieve "now" datetime
        $mytime = \Carbon\Carbon::now();
        $diff_in_hours = \Carbon\Carbon::parse($slot->lesson_start) -> diffInHours($mytime);
        
        // check if difference is > 6 hours
        if ($diff_in_hours>6) {

        // DELETE RESERVATION IF TIME - NOW > 6 HOURS
        $reservation->delete();
        return redirect('user_data')->with([
            'flash_message' => 'Canceled',
            'flash_message_important' => false
          ]);
        } else {

        return redirect('user_data')->with([
            'flash_message' => 'Reservation can\'t be canceled within 6 hours from the lesson',
            'flash_message_important' => false
          ]);
        }
    }

    // STORE NEW USER PERSONAL DATA
    public function store($id = null)
    {
        $user = new \App\user();
        if ($user->password == $user->password_repeat) {
            $user->fill(request()->only(['email', 'phone', 'address', 'password']));
            $user->save();
            session()->flash('success_message', 'Updated user data was successfully saved!');
        return redirect('/user_data');
        } else {
            session()->flash('The two passwords inserted should be equal');
        return redirect('/user_data');
        }
    }


}



