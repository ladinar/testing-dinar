<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotMail extends Mailable
{
    use Queueable, SerializesModels;
    public $customSubject,$username,$token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customSubject,$username,$token)
    {
        //
        $this->customSubject = $customSubject;
        $this->username = $username;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->customSubject)->view('Mails.forgot');
    }
}