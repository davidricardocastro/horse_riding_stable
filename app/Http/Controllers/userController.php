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

        $user_table = \App\User::get();
        $slot_table = \App\slot::get();
        $reservation_table = \App\reservation::get();

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
        $reservations = \App\reservation::select(
            'reservations.*',
            'slots.lesson_start',
            'slots.lesson_end',
            'slots.description as slot_description'
        )
        ->leftJoin('slots', 'reservations.slot_id', '=', 'slots.id')
        ->where('reservations.user_id', '=', $user->id)
        ->where('slots.lesson_start', '>', date('Y-m-d H:i:s'))
        ->orderBy('id', 'DESC')
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

        // CANCEL RESERVATION IF (TIME - NOW) > 6 HOURS
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

    // UPDATE USER PERSONAL DATA
    public function store(\App\User $user)
    {
        $psw  = request()->input('password');
        $psw_repeat  = request()->input('password_repeat');

        if ($psw !== null && $psw == $psw_repeat) {
            $user->fill(request()->only(['email', 'phone', 'address']));
            $user->password = bcrypt($psw); // HERE NEW PASSWORD IS ENCRYPTED AND STORED
            $user->update();
            return redirect('/user_data')->with([
            'flash_message' => 'Updated user data was successfully saved!',
            'flash_message_important' => false
          ]);
        } 
        else if ($psw !== $psw_repeat) {
            session()->flash('The two passwords inserted should be equal');
            return redirect('/user_data');
        } 
        else if ($psw == null) {
            $user->fill(request()->only(['email', 'phone', 'address']));
            $user->update();
            return redirect('user_data')->with('status', 'Updated user data was successfully saved!');
        }
    }


}



