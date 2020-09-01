<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CandidateCertificates extends Model
{
    use SoftDeletes;

    protected $table = 'candidate_certifications';
    protected $fillable = [
        'candidate_id',
        'name',
        'path',
        'url'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id');
    }
}
