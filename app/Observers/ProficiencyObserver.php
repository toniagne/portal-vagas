<?php

namespace App\Observers;

use App\Models\History;
use App\Models\Proficiency;

class ProficiencyObserver
{

    public function created(Proficiency $proficiency)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Cadastrou uma nova carreira: '. $proficiency->name);
    }


    public function updated(Proficiency $proficiency)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Editou a carreira: '. $proficiency->name);
    }


    public function deleted(Proficiency $proficiency)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Apagou uma carreira: '. $proficiency->name);
    }


    public function restored(Proficiency $proficiency)
    {
        //
    }


    public function forceDeleted(Proficiency $proficiency)
    {
        //
    }
}
