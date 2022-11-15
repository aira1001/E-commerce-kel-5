<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saksi extends Model
{
    use HasFactory;
    protected $table = 'saksi';
    protected $primaryKey = 'id_saksi';
    public $timestamps = false;
    protected $fillable = ['id_reservasi', 'nama', 'umur', 'asal'];
}
