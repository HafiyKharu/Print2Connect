<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TemplateEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $details = [
        'title',
        'body'
    ];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this -> details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from Print2Connect')
                    ->view('emails.templateEmail');
    }
    public function attachments(): array
    {
        return [
            storage_path('app/public/PRINT2CONNECT.png'), // Adjust path as needed
        ];
    }
}
