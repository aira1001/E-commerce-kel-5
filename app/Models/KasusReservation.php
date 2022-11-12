<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasusReservation extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_reservasi';
    protected $fillable = ['id_pelapor', 'judul_kasus', 'waktu_kejadian', 'tempat_kejadian', 'terlapor', 'korban', 'bagaimana_terjadi', 'barang_bukti', 'uraian_singkat_kejadian', 'status'];
}
