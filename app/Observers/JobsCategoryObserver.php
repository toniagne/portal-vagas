<?php

namespace App\Observers;

use App\Models\JobCategory;
use App\Models\History;

class JobsCategoryObserver
{


    public function created(JobCategory $jobCategory)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Cadastrou uma nova carreira: '. $jobCategory->name);
    }


    public function updated(JobCategory $jobCategory)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Editou a carreira: '. $jobCategory->name);
    }


    public function deleted(JobCategory $jobCategory)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Apagou uma carreira: '. $jobCategory->name);
    }


    public function restored(JobCategory $jobCategory)
    {
        //
    }


    public function forceDeleted(JobCategory $jobCategory)
    {
        //
    }
}
