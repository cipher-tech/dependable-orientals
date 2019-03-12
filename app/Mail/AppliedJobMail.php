<?php

namespace App\Mail;

use App\Http\Controllers\PublicJobsController;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AppliedJobMail extends Mailable
{
    public $job;
    public $mainUser;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($job, $mainUser)
    {
        $this->job = $job;
        $this->mainUser = $mainUser;
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
        $subject = "New Job Application";
        return $this->view('email.appliedJob')
        ->from($address, $name)
        ->subject($subject);
    }
}
