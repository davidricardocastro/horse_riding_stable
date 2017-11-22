<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slot;
use App\User;
use App\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

    /**
     * @return reservation
     */
    public function create_reservation()
    {
        //API creates a reservation row with the following columns:
        //(id, user_id, slot_id, n_of_spots)

        //$user_id = \Auth::id();
        //var_dump($user_id);die();
        $user_id = request()->input('user_id');
        $slot_id = request()->input('id');//request the slot id of the selected slot
        //var_dump(request()->input('id'));
        $n_of_spots = request()->input('n_of_spots');//slot spot -1 //number of riders availables to reserve0


        $reservation = new Reservation;
        $reservation->user_id = $user_id;
        $reservation->slot_id = $slot_id;
        $reservation->n_of_spots = $n_of_spots;

        $reservation->save();
        return $reservation;


    }
    public function display_reservation()
    {   //2017-11-15 16:00:00 this is the format in the DB
        //11/16/2017 this is the format in the JS Datepicker

        //I store the AJAX request(date: 11/16/2017 into the variable $date)
        $date = request()->input('date');

        //I change it into DB format -> 2017-11-15 16:00:00
        $date = date('Y-m-d', strtotime($date));

        //Now I request the info
        $slots = Slot::where('lesson_start','>=',$date.' 00:00:00')->where('lesson_end','<=',$date.' 23:59:59')->get();

        //$n_of_spots = 4;
        return $slots;
    }


    /**
     * @return string
     */
    public function week()
    {   $monday = 'Hello';
        //$monday = request()->input('monday');
        //select the week into a JSON object
        return $monday;
    }

}
