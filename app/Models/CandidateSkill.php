<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateSkill extends Model
{
    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id', 'id');
    }
}
