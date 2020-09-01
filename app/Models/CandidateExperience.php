<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CandidateExperience extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'candidate_id',
        'company_name',
        'company_type',
        'activity_resume',
        'expedient_start',
        'expedient_end',
        'current_job',
    ];

    protected $casts  = [
       'period_start' => 'date:Y-m-d',
       'period_end'   => 'date:Y-m-d',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id');
    }

}
