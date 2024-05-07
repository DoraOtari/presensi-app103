<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class NikOtomatis extends Component
{
    public function render()
    {
        return view('livewire.nik-otomatis',['list_users' => DB::table('users')->get()]);
    }
}
