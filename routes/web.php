<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\KaryawanController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.konten.beranda');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/profil', function(){
    return view('admin.konten.profil');
});

Route::post('/upload', function(Request $req){
    User::where('id', Auth::user()->id)->update(
        [
            'avatar' => $req->foto->store('Avatar'),
        ]
    );
    return redirect()->back();
});

Route::get('/jabatan', function(){
    $jabatan = DB::table('jabatan')->get();
    return view('admin.konten.jabatan', [ 'jabatan' => $jabatan ]);
});

Route::get('/karyawan',[KaryawanController::class, 'tampil']);
Route::get('/karyawan/create', [KaryawanController::class, 'buat']);
Route::post('/karyawan', [KaryawanController::class,'simpan']);
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy']);
Route::get('karyawan/{karyawan}/edit',[KaryawanController::class, 'edit']);
Route::put('karyawan/{karyawan}', [KaryawanController::class, 'update']);

Route::get('/absen', [AbsenController::class, 'tampil']);
Route::post('/absen', [AbsenController::class, 'simpan']);
Route::get('/riwayat', [AbsenController::class,'riwayat']);