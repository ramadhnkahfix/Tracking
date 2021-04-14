<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifikasiDokBalasan extends Mailable
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
        $email = $this->markdown('email.pages.dokumenbalasan');
        foreach($this->dokumen as $dok){
            $path = public_path()."/file_balasan"."/".$dok->file;
            $email->attach($path);
        }

        return $email; 
        // return $this->markdown('email.pages.dokumenbalasan')
        //         ->attach(public_path().'/');
    }
}
