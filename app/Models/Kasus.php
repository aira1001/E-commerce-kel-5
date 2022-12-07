<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasus extends Model
{
    use HasFactory;
    protected $table = "kasus";

    protected $fillable = ['nama_kasus','deskripsi_kasus','tindak_pidana', 'id_pra_kasus', 'id_status_kasus', 'id_pegawai_pic', 'lembaga_pic', 'id_perintah'];

    public function prakasus(){
        return $this->belongsTo(PraKasus::class, 'id_pra_kasus');
    }
    public function pegawaikasus(){
        return $this->belongsTo(Pegawai::class, 'id_pegawai_pic');
    }
    public function statuskasus(){
        return $this->belongsTo(StatusKasus::class, 'id_status_kasus');
    }
    public function perintahdisposisi(){
        return $this->belongsTo(PerintahDisposisi::class, 'id_perintah');
    }
    public function lembagakepolisian(){
        return $this->belongsTo(LembagaKepolisian::class, 'lembaga_pic');
    }
    public function pelaporankasus(){
        return $this->hasMany(PelaporanKasus::class, 'id_kasus');
    }
}
