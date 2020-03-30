<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insertOrIgnore([
            'name' => 'Ahmed Soliman',
            'email' => 'ahmedsliman@gmail.com',
            'password' => Hash::make('adminforfleet'),
        ]);

        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insertOrIgnore([
                'name' => Str::random(),
                'email' => "user{$i}@gmail.com",
                'password' => Hash::make("user{$i}"),
            ]);
        }
    }
}