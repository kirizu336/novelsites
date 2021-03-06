<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\FT;
use App\Mail;

class ftdecline extends Mailable
{
    use Queueable, SerializesModels;

    public $ft;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(FT $ft)
    {
        $this->ft = $ft;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('novelbaru@administrator.com')
                ->view('emails.ftdecline');
    }
}
