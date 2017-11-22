<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\slot;

class DaySlotController extends Controller
{
   
   public function index()
   {
       return view('slots/day');
   }


   public function show($lesson_start)
   {
        //if user inputs a wrong value
        if(!preg_match("#^\d{4}-\d{2}-\d{2}$#", $lesson_start))
        {
        // TODO inform the user and return somewhere
        $lesson_start = date('Y-m-d'); // for now let's just use today
        }
        $day_beginning = $lesson_start . ' 00:00:00';
        $day_end = date('Y-m-d', strtotime($lesson_start . ' 12:00:00') + 86400) . ' 00:00:00';
        $slots = slot::where('lesson_start', '>=', $day_beginning)
        ->where('lesson_end', '<=', $day_end)
        ->get();

       $view = view('slots/day');
       
       //var_dump($slots);
       
       $view->slots = $slots;       
       $view->lesson_start = $lesson_start;
       return $view;
   }
}
