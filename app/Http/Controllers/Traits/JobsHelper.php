<?php

namespace App\Http\Controllers\Traits;

use App\Models\Job;

Trait JobsHelper
{
    /**
     * @param Job $job
     * @param $user
     * @return float|int
     */
    public function getMatchingJobUser(Job $job, $user)
    {
        $match = 0;
        $matchValue = 25;

        $jobSalaryStart = (float) $job->wage_start;
        $salaryStart    = (float) $user->salary->first()->minimum;

        $jobSalaryEnd   = (float) $job->wage_end;
        $salaryEnd      = (float) $user->salary->first()->maximum;

        if ($salaryStart >= $jobSalaryStart) $match+= 12.5;

        if ($salaryEnd <= $jobSalaryEnd) $match += 12.5;

        if ($user->skills()->count()) $match+= $matchValue;



        return round($match);
    }
}
