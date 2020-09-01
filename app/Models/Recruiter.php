<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Position;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailUser;

class Recruiter extends Model
{
    public $table ='users';

    protected $guard = 'candidate';

    protected $fillable = [
        'name', 'email', 'phone', 'password', 'role_id', 'positions_id'
    ];

    // ENCRIPTA A SENHA PASSADA PELO REQUEST
    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'positions_id');
    }

    public function getPassword($lengh = 8){
        // GERA SENHA ALEATÓRIA UTILIZANDO HELPER STR
        $pass = Str::random($lengh);

        // GATILHO DE ENVIO DE E-MAIL
        Mail::to('toniagne@gmail.com')
            ->send(new SendMailUser(['args' => ['password' => $pass, 'recruiter' => $this]]));

        return $pass;
    }

    // RETORNA O STATUS DO RECRUTADOR
    public function status(){
        switch ($this->active){
            case 0: return "Inativo"; break;
            case 1: return "Ativo"; break;
        }
    }
}
