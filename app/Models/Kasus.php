<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasus extends Model
{
    use HasFactory;
    protected $table = "kasus";

    protected $fillable = ['nama_kasus','deskripsi_kasus','tindak_pidana', 'id_pra_kasus', 'id_status_kasus', 'id_pegawai_pic', 'lembaga_pic'];
}
