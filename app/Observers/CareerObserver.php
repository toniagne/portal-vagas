<?php

namespace App\Observers;

use App\Models\Career;
use App\Models\History;

class CareerObserver
{
    public function created(Career $career)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Cadastrou uma nova carreira: '. $career->name);
    }


    public function updated(Career $career)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Editou a carreira: '. $career->name);
    }


    public function deleted(Career $career)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Apagou uma carreira: '. $career->name);
    }


    public function restored(Career $career)
    {
        //
    }


    public function forceDeleted(Career $career)
    {
        //
    }
}
