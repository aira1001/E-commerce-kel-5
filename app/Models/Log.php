<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $table = 'log';
    protected $fillable = ['id_kasus', 'id_pra_kasus', 'id_aktifitas', 'id_user'];
}
