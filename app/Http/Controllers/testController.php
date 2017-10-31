<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horse;

class testController extends Controller
{   //this displays the data from the database
    public function index()
    {
        $horse = Horse::all();//to display all the regss
        //$horse = Horse::first();//to display just the first
        //$horse = Horse::find(2);//to find one specific entity you can use the find
        //die('FELLO');
        echo 'Horse id : '.$horse[0]['id'].'<br>';
        echo 'Horse Name : '.$horse[0]['name'].'<br>';
        echo 'Horse images : '.$horse[0]['images'].'<br>';
      
        //creating a view
        $horse_with_m = Horse::where('name','like','M%')->get();

        $view = view('tests/index');

        $view->horse_with_m = $horse_with_m;

        
        return $view;
        
    }
    //this function creates the horse in the database by just loading the page
    public function create()
    {
        $horse = new Horse();
        $horse->name = 'Mummi';
        $horse->save();
        die('creating..');
    }
}
