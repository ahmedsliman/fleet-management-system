<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    protected $egyCities = [
        'Cairo', 'Giza', 'Al-Faiyum',
        'Beni Suef', 'Al-Minya', 'Asyut',
        'Sohag', 'Qena', 'Luxor', 'Aswan'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->egyCities as $cityName) {
            DB::table('cities')->insert([
                'name' => $cityName
            ]);
        }
    }
}