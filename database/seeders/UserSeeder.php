<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Jonathan C Jimenez",
            "email" => "joni051@gmail.com",
            "password" => bcrypt("12345678"),
            "codpuesto" => "0",
            "codzon" => "0",
            "role" => "1",
            "mun" => "100"
        ]);

        // User::create([
        //     "name" => "coordinado",
        //     "email" => "joni@gmail.com",
        //     "password" => bcrypt("12345678"),
        //     "codpuesto" => "33",
        //     "codzon" => "0",
        //     "role" => "3",
        //     "mun" => "0"
        // ])->assignRole('coordinator');

        // User::create([
        //     "name" => "escrutador",
        //     "email" => "joni15@gmail.com",
        //     "password" => bcrypt("12345678"),
        //     "codpuesto" => "0",
        //     "codzon" => "6",
        //     "role" => "2",
        //     "mun" => "0"
        // ])->assignRole('superuser');


    }
}
