<?php

namespace App\Observers;

use App\Models\CandidateExperience;

class CandidateExperienceObserver
{
    /**
     * Handle the candidate experience "created" event.
     *
     * @param  \App\Models\CandidateExperience  $candidateExperience
     * @return void
     */
    public function created(CandidateExperience $candidateExperience)
    {
        //
    }

    /**
     * Handle the candidate experience "updated" event.
     *
     * @param  \App\Models\CandidateExperience  $candidateExperience
     * @return void
     */
    public function updated(CandidateExperience $candidateExperience)
    {
        //
    }

    /**
     * Handle the candidate experience "deleted" event.
     *
     * @param  \App\Models\CandidateExperience  $candidateExperience
     * @return void
     */
    public function deleted(CandidateExperience $candidateExperience)
    {
        //
    }

    /**
     * Handle the candidate experience "restored" event.
     *
     * @param  \App\Models\CandidateExperience  $candidateExperience
     * @return void
     */
    public function restored(CandidateExperience $candidateExperience)
    {
        //
    }

    /**
     * Handle the candidate experience "force deleted" event.
     *
     * @param  \App\Models\CandidateExperience  $candidateExperience
     * @return void
     */
    public function forceDeleted(CandidateExperience $candidateExperience)
    {
        //
    }
}
