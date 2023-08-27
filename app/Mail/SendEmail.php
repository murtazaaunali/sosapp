<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public $data;

    public function __construct($profile)
    {
        $this->data = $profile;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('employee.email_template')
                ->with([
                        'father_first_name' => $this->data['father_first_name'],
                        'father_last_name' => $this->data['father_last_name'],
                        'password' => $this->data['password'],
                        'email' => $this->data['email'],
                        'subject' => $this->data['subject'],
                    ]);
    }
}
