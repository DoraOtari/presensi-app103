<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Hera Setiawan',
            'email' => 'hera@gmail.com',
            'password' => Hash::make('hera1234'),
            'email_verified_at' => now(), 
        ]);

        DB::table('users')->insert([
            'name' => 'Albert Einstein',
            'email' => 'albert@gmail.com',
            'password' => Hash::make('albert1234'),
            'email_verified_at' => now(),
        ]);
    }
}
