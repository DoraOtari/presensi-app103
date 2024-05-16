<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class ApiDaerah extends Component
{
    public $provinsi;

    function ambilProvinsi() {
       return Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json")->collect();
    }

    function ambilKota(){
        $id = Str::before($this->provinsi, '/');
        return Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/$id.json")->collect();
    }

    public function render()
    {
        return view('livewire.api-daerah',[
            'list_provinsi' => $this->ambilProvinsi(),
            'list_kota' => $this->ambilKota(),
        ]);
    }
}
