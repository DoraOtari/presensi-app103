<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    function tampil() {
        return view('admin.konten.karyawan.index',[ 'karyawan' =>Karyawan::all() ]);
    }

    function buat() {
        return view('admin.konten.create', ['jabatan' => Jabatan::all() ]);
    }

    function simpan(){
        DB::table('karyawan')->insert([
            'nama' => request('nama'),
            'jabatan_id' => request('jabatan_id'),
            'nik' => request('nik'),
            'user_id' => request('user_id'),
            'tanggal_lahir' => request('tanggal_lahir'),
            'provinsi' => request('provinsi'),
            'kota' => request('kota'),
            'alamat' => request('alamat'),
        ]);
        return redirect('/karyawan');
    }

}
