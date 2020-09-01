<?php

namespace App\Observers;

use App\Models\History;
use App\Models\Skill;

class SkillsObserver
{
    public function created(Skill $skill)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Cadastrou uma nova habilidade: '. $skill->name);
    }


    public function updated(Skill $skill)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Editou a habilidade: '. $skill->name);
    }


    public function deleted(Skill $skill)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Apagou uma habilidade: '. $skill->name);
    }


    public function restored(Skill $proficiency)
    {
        //
    }


    public function forceDeleted(Skill $proficiency)
    {
        //
    }
}
