<?php

namespace App\Observers;

use App\Models\History;
use App\Models\Recruiter;

class RecruiterObserver
{

    public function created(Recruiter $recruiter)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Cadastrou uma novo recrutador: '. $recruiter->name);
    }


    public function updated(Recruiter $recruiter)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Editou o recrutador: '. $recruiter->name);
    }


    public function deleted(Recruiter $recruiter)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Apagou o recrutador: '. $recruiter->name);
    }


    public function restored(Recruiter $recruiter)
    {
        //
    }


    public function forceDeleted(Recruiter $recruiter)
    {
        //
    }
}
