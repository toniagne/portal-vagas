<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobBenefit extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'job_id',
        'job_benefit_id',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }

    public function benefits()
    {
        return $this->belongsTo(Benefit::class, 'job_benefit_id', 'id');
    }
}
