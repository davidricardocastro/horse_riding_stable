<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function admin()
    {
        $userId = \Auth::id();
        $email = \Auth::user()->email;
        return view('admin',['user'=>$userId,'email'=>$email]);
    }


}
