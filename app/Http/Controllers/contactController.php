<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;
use Mail;
use App\Mail\ContactMail;

class contactController extends Controller
{
    // Display a listing of the resource.
    public function contact()
    {   
        
        
        
        return view('contact');
    }

    // Show the form for creating a new resource.
    public function create() {
        //$view = view('contact');
        //$view->contact = new Contact;
        //return $view;
    }
        
    // Store a newly created resource in storage.
    public function store()  {

        $contact = new Contact();

        $contact->fill(request()->only([
            'name',
            'email',
            'phone',
            'message'
        ]));
        $contact->save();

        // flash a success message
        session()->flash('success_message', 'Message was sent');
        
        // redirect to mainpage
      //return redirect()->action('indexController@index');
        


       
$request = request();

//For sending contact to email. 
$email=new ContactMail(array(
    'name' => $request->get('name'),
    'email' => $request->get('email'),
    'user_message' => $request->get('message'),
    'phone'=>$request->get('phone')
));

Mail::to('davidricardocastro@gmail.com', 'Admin')->send($email);

    /* Mail::send('emails.contact',
        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_message' => $request->get('message')
        ), function($message)
    {
        $message->from('davidricardocastro@outlook.com');
        $message->to('davidricardocastro@gmail.com', 'Admin')->subject('contact');
    });*/


    //need a redirect and thank you message
    return redirect()->action('indexController@index');
   //return Redirect::route('contact')->with('message', 'Thanks for contacting us!');


    }
        


}
