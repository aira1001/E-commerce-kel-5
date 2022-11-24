<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKasus extends Model
{
    use HasFactory;
    protected $table = 'status_kasus';
    public $timestamps = false;
    protected $fillable = ['nama', 'level_urgensi'];
}
