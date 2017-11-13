<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function admin()
    {
        $userId = \Auth::id();
        $name = \Auth::user()->name;
        $email = \Auth::user()->email;
        return view('admin',['user_id'=>$userId,'user_name'=>$name,'user_email'=>$email]);
    }


}
