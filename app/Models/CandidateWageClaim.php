<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateWageClaim extends Model
{
    protected $fillable = [
         'candidate_id',
         'minimum',
         'maximum',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id');
    }
}
