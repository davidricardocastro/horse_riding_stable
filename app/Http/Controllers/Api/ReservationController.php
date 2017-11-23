<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\slot;
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
        $n_of_spots = request()->input('n_of_spots');//slot spot -1 //number of riders availables to reserve0
        $n_students = request()->input('n_students');//slot spot -1 //number of riders availables to reserve0

        $n_student = slot::find($slot_id);
        $n_student->n_students = $n_students-$n_of_spots;
        $n_student->save();


        /*
        $affected = Slot::find($slot_id)->get();
        $affected->n_students = $n_of_spots;
        $affected->save();

 public function edit(Request $request,$id) {
      $name = $request->input('stud_name');
      DB::update('update slots set n_students = ? where id = ?',[$n_of_spots,$slot_id]);
      echo "Record updated successfully.<br/>";
      echo '<a href = "/edit-records">Click Here</a> to go back.';
   }

*/


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
        $slots = slot::where('lesson_start','>=',$date.' 00:00:00')->where('lesson_end','<=',$date.' 23:59:59')->get();


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
