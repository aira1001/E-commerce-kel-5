<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelaporanKasus extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    use HasFactory;
    protected $table = 'pelaporan_kasus';
    protected $primaryKey = 'id_pelaporan';
    public $timestamps = false;
    protected $fillable = ['id_kasus', 'perihal','deskripsi'];
}
