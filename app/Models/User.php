<?php

namespace App\Models;

// use Attribute;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'id_user');
    }
    public function pejabat()
    {
        return $this->hasOne(LembagaKepolisian::class, 'id_user');
    }

    // public function pra_kasus(){
    //     return $this->hasMany('App\Models\PraKasus', 'id' );
    // }
    // protected function role(): Attribute{
    //     return new Attribute(
    //         get: fn($value) => ["user", "admin", "pejabat", "tim_creator", "tim_members"][$value],
    //     );
    // }
}
