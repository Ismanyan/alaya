<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = "history";
    protected $fillable = [
        'users_id', 'treatment_id', 'date', 'time_entry', 'time_out', 'duration'
    ];
}
