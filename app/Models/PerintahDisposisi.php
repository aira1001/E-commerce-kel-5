<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerintahDisposisi extends Model
{
    use HasFactory;
    protected $table = 'perintah_disposisi';
    public $timestamps = false;
    protected $fillable = ['perintah'];
}
