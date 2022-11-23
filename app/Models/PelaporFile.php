<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelaporFile extends Model
{
    use HasFactory;
    protected $table = 'pelapor_file';
    public $timestamps = false;
    protected $fillable = ['id_pra_kasus', 'path_file'];
    public function PraKasus(){
        return $this->belongsTo('App\Models\PraKasus', 'id_pra_kasus');
    }
}

