<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->truncate();

        for ($i = 1; $i <= 75; $i++) {
            $from = rand(1, 7);
            $suggestTo = rand(2, 10);
            $to = ($suggestTo > $from) ? $suggestTo : $from + rand(1, 3);
            $seat = rand(1, 25);
            DB::table('reservations')->insertOrIgnore([
                'from' => $from,
                'to' => $to,
                'seat' => $seat,
            ]);
        }
    }
}