<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadFile extends Component
{
    use WithFileUploads;

    public $photo;
    public function render()
    {
        return view('livewire.upload-file');
    }
}
