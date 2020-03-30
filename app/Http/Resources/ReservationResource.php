<?php

namespace App\Http\Resources;

use App\City;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'from' => City::find($this->from)->name,
                'to' => City::find($this->to)->name,
                'seat' => $this->seat,
            ]
        ];
    }
}