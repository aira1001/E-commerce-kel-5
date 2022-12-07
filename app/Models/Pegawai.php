<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    public $timestamps = false;

    protected $fillable = ['nama', 'nrp', 'id_user', 'id_pangkat', 'id_jabatan', 'id_lembaga'];
    public function kasus()
    {
        return $this->hasMany(Kasus::class, "id_pegawai_pic");
    }
    public function user()
    {
        return $this->belongsTo(User::class, "id_user");
    }
}
