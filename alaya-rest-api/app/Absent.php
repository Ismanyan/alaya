<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    protected $fillable = [
        'users_id', 'longitude', 'latitude', 'location', 'time_entry', 'time_out', 'date'
    ];

}
