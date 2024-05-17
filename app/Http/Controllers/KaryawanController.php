<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    function tampil() {
        return view('admin.konten.karyawan.index');
    }

    function buat() {
        return view('admin.konten.create');
    }

    function simpan(){
        DB::table('karyawan')->insert([
            'nama' => request('nama'),
            'nik' => request('nik'),
            'user_id' => request('user_id'),
            'tanggal_lahir' => request('tanggal_lahir'),
            'provinsi' => request('provinsi'),
            'kota' => request('kota'),
            'alamat' => request('alamat'),
        ]);
        return redirect()->back();
    }

}
