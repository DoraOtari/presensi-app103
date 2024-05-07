<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UploadFile extends Component
{
    public $photo;
    
    public function render()
    {
        return view('livewire.upload-file');
    }
}
