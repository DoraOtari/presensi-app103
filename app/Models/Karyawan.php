<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';
    protected $guarded = ['id'];

    function user(){
        return $this->belongsTo(User::class);
    }

    function jabatan(){
        return $this->belongsTo(Jabatan::class);
    }

}
