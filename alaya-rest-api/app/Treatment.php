<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $fillable = [
        'name', 'desc',  'price', 'photo', 'branch_id'
    ];
}
