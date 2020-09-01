<?php

namespace App\Observers;

use App\Models\Benefit;
use App\Models\History;

class BenefitObserver
{
    public function created(Benefit $benefit)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Cadastrou uma nova carreira: '. $benefit->name);
    }


    public function updated(Benefit $benefit)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Editou a carreira: '. $benefit->name);
    }


    public function deleted(Benefit $benefit)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Apagou uma carreira: '. $benefit->name);
    }


    public function restored(Benefit $benefit)
    {
        //
    }


    public function forceDeleted(Benefit $benefit)
    {
        //
    }
}
