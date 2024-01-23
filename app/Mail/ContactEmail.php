<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * The demo object instance.
     *
     * @var Contact
     */
    public $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('exposiciofestamajor@mktcultural.cat')
        //$this->from($this->contact->email)
                    ->view('mails.contact')
                    ->text('mails.contact_plain');
    }
}
