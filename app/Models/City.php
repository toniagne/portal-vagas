<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $fillable = [
        'state_id',
        'name'
    ];

    protected $hidden = [
        "created_at",
        "updated_at",
        "deleted_at"
    ];

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

}
