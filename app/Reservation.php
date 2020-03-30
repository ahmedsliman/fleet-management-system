<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}