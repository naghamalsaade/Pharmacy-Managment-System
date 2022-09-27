<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $data;

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
        return $this->subject('Mail from pharmacy Management system')
            ->view('emails.dynamic_email')->with('data', $this->data);  //the viw show to resever person with data

//        return $this->from('nagham@web.info')->subject($this ->data['subject'])
//            ->view('emails.dynamic_email')->with('data', $this->data);  //the viw show to resever person with data


    }
}
