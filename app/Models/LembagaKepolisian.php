<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LembagaKepolisian extends Model
{
    use HasFactory;
    protected $table = 'lembaga_kepolisian';
    public $timestamps = false;
    protected $primaryKey = 'id_lembaga';

    protected $fillable = ["nama_lembaga", "kepala_lembaga"];
}
