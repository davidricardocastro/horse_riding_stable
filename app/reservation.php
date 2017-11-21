<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    protected $fillable = [
        'user_id', 'slot_id', 'n_of_spots',
    ];

    protected $table = 'reservations';
}
