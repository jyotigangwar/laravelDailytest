<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyCategoryMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data; 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }   

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('emails.categorycreated');
        return $this->subject("OTP for login")->view('emails.categorycreated')
        ->with([
            'category_name' => $this->data['name'],
            'category_description' => $this->data['description'],
        ]);
    }
}
