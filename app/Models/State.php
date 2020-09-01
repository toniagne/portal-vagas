<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{

    protected $fillable = [
        'name',
        'initials',
    ];

    protected $hidden = [
        "created_at",
        "updated_at"
    ];
}
