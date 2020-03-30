<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}