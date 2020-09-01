<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailUser extends Mailable
{
    use Queueable, SerializesModels;

protected $args;
    public function __construct($args)
    {
        $this->args = $args;
    }


    public function build()
    {

        return $this->from('toniagne@email.com')
            ->view('emails.user-send-password')
            ->with([
                'password'  => $this->args['args']['password'],
                'recruiter' => $this->args['args']['recruiter']
            ]);
    }
}
