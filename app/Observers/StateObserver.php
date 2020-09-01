<?php

namespace App\Observers;

use App\Models\State;

class StateObserver
{
    /**
     * Handle the state "created" event.
     *
     * @param  \App\Models\State  $state
     * @return void
     */
    public function created(State $state)
    {
        //
    }

    /**
     * Handle the state "updated" event.
     *
     * @param  \App\Models\State  $state
     * @return void
     */
    public function updated(State $state)
    {
        //
    }

    /**
     * Handle the state "deleted" event.
     *
     * @param  \App\Models\State  $state
     * @return void
     */
    public function deleted(State $state)
    {
        //
    }

    /**
     * Handle the state "restored" event.
     *
     * @param  \App\Models\State  $state
     * @return void
     */
    public function restored(State $state)
    {
        //
    }

    /**
     * Handle the state "force deleted" event.
     *
     * @param  \App\Models\State  $state
     * @return void
     */
    public function forceDeleted(State $state)
    {
        //
    }
}
