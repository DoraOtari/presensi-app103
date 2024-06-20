<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AbsenController extends Controller
{
    function tampil()  {
        return view('admin.konten.karyawan.absen');
    }

    function simpan(Request $request) {

        $request->validate([
            'foto' => 'required',
            'lokasi' => 'required',
        ]);
        
        // nyimpan foto
        $fotoBase64 = Str::after($request->foto, ',');
        $foto = base64_decode($fotoBase64);
        
        $namaFoto = uniqid().'.jpg';  

        $lokasiFoto = "Foto Absen/$namaFoto"; 

        Storage::put($lokasiFoto, $foto);

        // data tambah
        $jam = date('H.i');
        $tgl = date('Y-m-d');
        $user_id = Auth::user()->id;
        
        if ($request->keterangan == 'masuk') {
            Absen::create([
                'user_id' => $user_id,
                'tanggal' => $tgl,
                'jam_masuk' => $jam,
                'foto_masuk' => $lokasiFoto,
                'lokasi_masuk' => $request->lokasi,
            ]);
        }

        if ($request->keterangan == 'pulang') {
            Absen::where('user_id', $user_id)->update([
                'user_id' => $user_id,
                'tanggal' => $tgl,
                'jam_pulang' => $jam,
                'foto_pulang' => $lokasiFoto,
                'lokasi_pulang' => $request->lokasi,
            ]);
        }

        return redirect('absen')->with('notif', "Berhasil Absen $request->keterangan");
    }

    function riwayat()  {
        $absen = Absen::with('user')->get();
        return view('admin.konten.karyawan.riwayat-absen', ['riwayat' => $absen]);
    }

}
