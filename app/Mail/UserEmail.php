<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserEmail extends Mailable
{
    use Queueable, SerializesModels;
     public $name;
     public $email;
     public $phone;
     public $subject;
     public $from;
     public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$phone,$subject,$from,$message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->subject = $subject;
        $this->from = $from;
        $this->message = $message;



    }



    public function build()
    {
        return $this->subject('Mail from khalid-art.com')
                    ->view('emails.userEmail');
    }
    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */

}
