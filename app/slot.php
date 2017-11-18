<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slot extends Model
{
    //
    protected $fillable = [
        'n_students',
        'description',
        'lesson_start',
        'lesson_end',
        'available'  
    ];

    protected $guarded = [
        'id'
    ];
}


