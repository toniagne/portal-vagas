<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Auth\Notifications\ResetPassword;

class ResetPasswordNotification extends ResetPassword implements ShouldQueue
{
    use Queueable;

    /**
     * ResetPasswordNotification constructor.
     * @param $token
     */
    public function __construct($token)
    {
        $this->queue = 'mail';
        parent::__construct($token);
    }

}
