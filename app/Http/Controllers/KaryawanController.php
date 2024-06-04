<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    function tampil() {
        return view('admin.konten.karyawan.index',[ 
            'karyawan' => Karyawan::with('user','jabatan')->get(),
        ]);
    }

    function buat() {
        return view('admin.konten.create', ['jabatan' => Jabatan::all() ]);
    }

    function simpan(Request $request){
        $valid = $request->validate([
            'nama' => 'required',
            'jabatan_id' => 'required',
            'nik' => 'required',
            'user_id' => 'required',
            'tanggal_lahir' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'alamat' => 'required',
        ]);

        Karyawan::create([
            'nama' => request('nama'),
            'jabatan_id' => request('jabatan_id'),
            'nik' => request('nik'),
            'user_id' => request('user_id'),
            'tanggal_lahir' => request('tanggal_lahir'),
            'provinsi' => request('provinsi'),
            'kota' => request('kota'),
            'alamat' => request('alamat'),
        ]);

        return redirect('/karyawan')->with('notif','Berhasil tambah data karyawan');
    }

    function destroy($id) {
       Karyawan::destroy($id); //kode hapus
       //kode pindah halaman beserta notif (☞ﾟヮﾟ)☞
       return redirect('karyawan')->with('notif', 'Berhasil hapus data karyawan');
    }

}
