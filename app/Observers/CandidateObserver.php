<?php

namespace App\Observers;

//use App\Events\CandidateRegistered;
use App\Models\Candidate;

class CandidateObserver
{
    /**
     * Handle the candidate "created" event.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return void
     */
    public function created(Candidate $candidate)
    {
//        event(new CandidateRegistered($candidate));
    }

    /**
     * Handle the candidate "updated" event.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return void
     */
    public function updated(Candidate $candidate)
    {
        //
    }

    /**
     * Handle the candidate "deleted" event.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return void
     */
    public function deleted(Candidate $candidate)
    {
        //
    }

    /**
     * Handle the candidate "restored" event.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return void
     */
    public function restored(Candidate $candidate)
    {
        //
    }

    /**
     * Handle the candidate "force deleted" event.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return void
     */
    public function forceDeleted(Candidate $candidate)
    {
        //
    }
}
