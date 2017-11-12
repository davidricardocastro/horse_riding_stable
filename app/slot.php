<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slot extends Model
{
    //
    protected $fillable = [
        'user_detail',
        'slot_detail'
    ];

    protected $guarded = [
        'id'
    ];
}
