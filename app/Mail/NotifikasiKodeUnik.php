<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifikasiKodeUnik extends Mailable
{
    use Queueable, SerializesModels;
    public $dokumen;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dokumen)
    {
        $this->dokumen = $dokumen;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.pages.kodeunik')
                    ->with('dokumen', $this->$dokumen);
    }
}
