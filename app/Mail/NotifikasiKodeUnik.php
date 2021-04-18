<?php

namespace App\Mail;

use App\Models\Dokuman;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Crypt;

class NotifikasiKodeUnik extends Mailable
{
    use Queueable, SerializesModels;

    public $dokumen;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Dokuman $dokumen)
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
        // $code = Crypt::decrypt($his->dokumen->kode);
        return $this->markdown('emails.pages.kodeunik')
                    ->with([
                        'kode'=>$this->dokumen->kode,
                    ]);
    }
}
