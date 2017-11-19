<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slot;

class ReservationController extends Controller
{
    //
    public function create_reservation()
    {
        $times = explode('-',request()->input('time'));

        $from_time = trim($times[0]);
        $until_time = trim($times[1]);

        $date_parts = explode('/', request()->input('date').'//');
        $day = $date_parts[1];
        $month = $date_parts[0];
        $year = $date_parts[2];


        $from_datetime = "{$year}-{$month}-{$day} {$from_time}:00";
        $until_datetime = "{$year}-{$month}-{$day} {$until_time}:00";

        $slot = new Slot;

        $slot->lesson_start = $from_datetime;
        $slot->lesson_end = $until_datetime;
        $slot->n_students = 1;

        $slot->save();

        return $slot;

        //dd($_POST);
        //

    }
}
