<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Request;
use Illuminate\Support\Facades\Auth;

class History extends Model
{
    protected $fillable = [
        'user_id', 'ip', 'action'
    ];

    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public static function registerLog($action){
      $data = [
          'user_id' => Auth::user()->id,
          'ip' => Request::ip(),
          'action' => $action
      ];

      return self::create($data);
    }

}
