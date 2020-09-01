<?php

namespace App\Observers;

use App\Models\History;
use App\Models\Specialization;

class SpecializationObserver
{

    public function created(Specialization $specialization)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Cadastrou uma nova carreira: '. $specialization->name);
    }


    public function updated(Specialization $specialization)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Editou a carreira: '. $specialization->name);
    }


    public function deleted(Specialization $specialization)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Apagou uma carreira: '. $specialization->name);
    }


    public function restored(Specialization $specialization)
    {
        //
    }


    public function forceDeleted(Specialization $specialization)
    {
        //
    }
}
