<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactThankYou extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function build()
    {
        return $this->subject('Thank you for contacting Skill Exchange!')
            ->view('emails.contact_thank_you')
            ->with(['data' => $this->data]);
    }
}
