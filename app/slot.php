<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slot extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message'
    ];

    protected $guarded = [
        'id'
    ];
}
