<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\slot;

class slotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('slot');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view('/slots/edit');
        $view->slot = new slot;
        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id = null)
    {
        if($id)
        {
            $slot = slot::findOrFail($id);
        }
        else
        {
            $slot = new slot();
        }

        $slot->fill(request()->only([
            'id',
            'n_students',
            'description',
            'lesson_start',
            'lesson_end',
            'available'  
            
        ]));
        
        $slot->save();
        
        session()->flash('success_message', 'Slot was successfully save'); 

        return redirect()->action('slotController@create', ['id' => $slot->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $view = view('slots/detail');
        
        $slot = slot::find($id);
        
        $view->slot = $slot;       
        
        return $view;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slot = slot::findOrFail($id);
        $view = view('/slots/edit');
        $view->slot = $slot;
        
        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function listing()
    {
        //return view('/slots/list');
        $view = view('slots/list');
            $all_slots = slot::all();
            //$all_authors= Author::orderBy('year', 'dsc')->get();

            $view->slots = $all_slots;
    
            return $view;
            
        
    }
}
