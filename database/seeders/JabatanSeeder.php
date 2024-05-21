<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jabatan')->insert([
            'nama_jabatan' => 'Direktur',
            'gaji_jabatan' => 8000000,
            'status_jabatan' => 'tetap',
        ]);
        DB::table('jabatan')->insert([
            'nama_jabatan' => 'Supervisor',
            'gaji_jabatan' => 6000000,
            'status_jabatan' => 'tetap',
        ]);
        DB::table('jabatan')->insert([
            'nama_jabatan' => 'Staff',
            'gaji_jabatan' => 3000000,
            'status_jabatan' => 'kontrak',
        ]);
    }
}
