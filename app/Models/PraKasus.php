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
}
