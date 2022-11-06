<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelaporKasus extends Model
{
    use HasFactory;
    protected $pelapor_kasus = "pelapor_kasus";

    protected $fillable = ['perihal','deskripsi'];
}
