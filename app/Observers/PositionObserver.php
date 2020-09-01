<?php

namespace App\Observers;

use App\Models\History;
use App\Models\Position;

class PositionObserver
{
    public function created(Position $position)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Cadastrou uma nova cargo: '. $position->name);
    }


    public function updated(Position $position)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Editou o cargo: '. $position->name);
    }


    public function deleted(Position $position)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Apagou o cargo: '. $position->name);
    }


    public function restored(Position $position)
    {
        //
    }


    public function forceDeleted(Position $position)
    {
        //
    }
}
