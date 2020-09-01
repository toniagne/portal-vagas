<?php

namespace App\Observers;

use App\Models\History;
use App\Models\JobRegime;

class JobRegimeObserver
{

    public function created(JobRegime $jobCategory)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Cadastrou um novo regime: '. $jobCategory->name);
    }


    public function updated(JobRegime $jobCategory)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Editou o regime: '. $jobCategory->name);
    }


    public function deleted(JobRegime $jobCategory)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Apagou o regime: '. $jobCategory->name);
    }


    public function restored(JobRegime $jobRegime)
    {
        //
    }


    public function forceDeleted(JobRegime $jobRegime)
    {
        //
    }
}
