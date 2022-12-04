<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    public $timestamps = false;

    protected $fillable = ['nama', 'nrp', 'id_pangkat', 'id_jabatan', 'id_lembaga'];
    protected function pegawaikasus(){
        return $this->hasOne("App\Models\Kasus", "id_pegawai_pic");
    }
}
