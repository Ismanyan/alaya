<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'id', 'name', 'address', 'phone', 'maps', 'start', 'end'
    ];
}
