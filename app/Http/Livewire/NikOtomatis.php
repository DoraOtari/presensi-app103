<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class NikOtomatis extends Component
{
    public $tgl;
    public $userId;
    public $karyawan;

    public function mount($karyawan = null){
        if ($karyawan) {
            $this->tgl = $karyawan->tanggal_lahir;
            $this->userId = $karyawan->user_id;
        }

    }

    public function buatNik() {
        return Str::replace('-','',$this->tgl).$this->userId;
    }

    public function render()
    {
        return view('livewire.nik-otomatis',[
            'list_users' => DB::table('users')->get(),
            'nik' => $this->buatNik(),
        ]);
    }
}
