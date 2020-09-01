<?php

namespace App;

use App\Models\Position;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guard = "users";

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }

    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'positions_id'
    ];

    protected $hidden = [
        'password', 'remember_token', 'role_id'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function status(){

        switch ($this->roule){
            case 1: return "Candidato"; break;
            case 2: return "Administrador"; break;
        }
    }


}
