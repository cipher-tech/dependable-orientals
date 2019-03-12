<?php

namespace App\Mail;

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterMail extends Mailable
{
    public $user;
    public $email;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $email)
    {
        $this->user = $user;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = "nickchibuikem@gmail.com";
        $name = "DORecruitment";
        $subject = "New Job User";
        return $this->view('email.newUser')
        ->from($address, $name)
        ->subject($subject);
    }
}
