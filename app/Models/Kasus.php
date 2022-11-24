<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasus extends Model
{
    use HasFactory;
    protected $table = "kasus";

    protected $fillable = ['nama_kasus','deskripsi_kasus','tindak_pidana', 'id_pra_kasus', 'id_status_kasus', 'id_pegawai_pic', 'lembaga_pic', 'id_perintah'];

    public function PraKasus(){
        return $this->belongsTo('App\Models\PraKasus', 'id_pra_kasus');
    }
    public function PegawaiKasus(){
        return $this->belongsTo("App\Models\Pegawai", 'id_pegawai_pic');
    }
    public function StatusKasus(){
        return $this->belongsTo("App\Models\StatusKasus", 'id_status_kasus');
    }
    public function PerintahDisposisi(){
        return $this->belongsTo("App\Models\PerintahDisposisi", 'id_perintah');
    }
    public function LembagaKepolisian(){
        return $this->belongsTo("App\Models\LembagaKepolisian", 'lembaga_pic');
    }
}
