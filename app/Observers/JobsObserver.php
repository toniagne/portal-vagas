<?php

namespace App\Observers;

use App\Models\Job;
use App\Models\History;

class JobsObserver
{
    public function created(Job $job)
    {

        // LOG DE ATIVIDADES
        History::registerLog('Cadastrou uma nova carreira: '. $job->name);
    }


    public function updated(Job $job)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Editou a carreira: '. $job->name);
    }


    public function deleted(Job $job)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Apagou uma carreira: '. $job->name);
    }

    public function restored(Job $job)
    {
        //
    }

    /**
     * Handle the job "force deleted" event.
     *
     * @param  \App\Models\Job  $job
     * @return void
     */
    public function forceDeleted(Job $job)
    {
        //
    }
}
