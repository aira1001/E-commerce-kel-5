<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PraKasus extends Model
{
    use HasFactory;

    protected $table = "pra_kasus";
    protected $primaryKey = 'id_pra_kasus';
    protected $fillable = ['id_pelapor', 'judul_kasus', 'waktu_kejadian', 'tempat_kejadian', 'terlapor', 'korban', 'bagaimana_terjadi', 'barang_bukti', 'uraian_singkat_kejadian', 'status'];
    public function user(){
        return $this->belongsTo('App\Models\User', 'id_pelapor');
    }
    public function saksi(){
        return $this->hasMany('App\Models\Saksi', 'id_pra_kasus');
    }
    public function pelaporFile(){
        return $this->hasMany('App\Models\PelaporFile', 'id_pra_kasus');
    }
}
