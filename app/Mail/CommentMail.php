<?php

namespace App\Mail;

use App\Http\Controllers\PublicJobsController;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $comment;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($comment, $email)
    {
        $this->comment = $comment;
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
        $subject = "New Comment";
        return $this->view('email.comment')
        ->from($address, $name)
        ->subject($subject);
    }
}
