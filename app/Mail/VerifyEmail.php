<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $token;

    public function __construct($user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    public function build()
    {
        $verifyUrl = url('/verify-email/' . $this->token);
        Log::info('VerifyEmail mailable: token=' . ($this->token ?? 'NULL') . ', verifyUrl=' . $verifyUrl);
        if (empty($this->token)) {
            Log::warning('VerifyEmail mailable: token is empty!');
        }
        return $this->subject('Verify Your Email Address')
            ->view('emails.verify_email')
            ->with([
                'user' => $this->user,
                'verifyUrl' => $verifyUrl,
            ]);
    }
}
