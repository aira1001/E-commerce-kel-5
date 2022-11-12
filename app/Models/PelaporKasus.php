<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelaporKasus extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    use HasFactory;
    protected $table = 'pelapor_kasus';
    protected $primaryKey = 'id_pelapor';
    public $timestamps = false;
    protected $fillable = ['nama', 'perihal','deskripsi'];
}
