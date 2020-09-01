<?php

namespace App\Observers;

use App\Models\SocialNetwork;
use App\Models\History;

class SocialNetworkObserver
{
    public function created(SocialNetwork $socialNetwork)
    {

        // LOG DE ATIVIDADES
        History::registerLog('Cadastrou uma nova rede social: '. $socialNetwork->name);
    }


    public function updated(SocialNetwork $socialNetwork)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Editou a rede social: '. $socialNetwork->name);
    }


    public function deleted(SocialNetwork $socialNetwork)
    {
        // LOG DE ATIVIDADES
        History::registerLog('Apagou uma rede social: '. $socialNetwork->name);
    }

    public function restored(SocialNetwork $socialNetwork)
    {
        //
    }

    /**
     * Handle the social network "force deleted" event.
     *
     * @param  \App\Models\SocialNetwork  $socialNetwork
     * @return void
     */
    public function forceDeleted(SocialNetwork $socialNetwork)
    {
        //
    }
}
