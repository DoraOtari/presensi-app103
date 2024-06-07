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
        return view('admin.konten.karyawan.create', ['jabatan' => Jabatan::all() ]);
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

        Karyawan::create($valid);

        return redirect('/karyawan')->with('notif','Berhasil tambah data karyawan');
    }

    function destroy($id) {
       Karyawan::destroy($id); //kode hapus
       //kode pindah halaman beserta notif (☞ﾟヮﾟ)☞
       return redirect('karyawan')->with('notif', 'Berhasil hapus data karyawan');
    }

    function edit(Karyawan $karyawan) {
        return view('admin.konten.edit', [
            'jabatan' => Jabatan::all(),
            'karyawan' => $karyawan
            ]
    );
    }

    function update(Request $request, Karyawan $karyawan){
        $valid = $request->validate([
            'nama' => 'required',
            'jabatan_id' => 'required',
            'nik' => 'required',
            'user_id' => 'required',
            'tanggal_lahir' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'alamat' => 'required',
        ],[
          'alamat.required' => 'alamat wajib di isi masbro / mbabro' 
        ]);

        Karyawan::where('id', $karyawan->id)->update($valid);
        return redirect('/karyawan')->with('notif',"Berhasil update karyawan $karyawan->nama");
    }

}
