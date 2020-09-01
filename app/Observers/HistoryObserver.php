<?php

namespace App\Observers;

use App\Models\History;

class HistoryObserver
{
    /**
     * Handle the history "created" event.
     *
     * @param  \App\Models\History  $history
     * @return void
     */
    public function created(History $history)
    {
        //
    }

    /**
     * Handle the history "updated" event.
     *
     * @param  \App\Models\History  $history
     * @return void
     */
    public function updated(History $history)
    {
        //
    }

    /**
     * Handle the history "deleted" event.
     *
     * @param  \App\Models\History  $history
     * @return void
     */
    public function deleted(History $history)
    {
        //
    }

    /**
     * Handle the history "restored" event.
     *
     * @param  \App\Models\History  $history
     * @return void
     */
    public function restored(History $history)
    {
        //
    }

    /**
     * Handle the history "force deleted" event.
     *
     * @param  \App\Models\History  $history
     * @return void
     */
    public function forceDeleted(History $history)
    {
        //
    }
}
