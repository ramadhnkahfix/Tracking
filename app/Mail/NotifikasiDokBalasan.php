<?php

namespace App\Mail;

use App\Models\Dokuman;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\DokumenSelesai;

class NotifikasiDokBalasan extends Mailable
{
    use Queueable, SerializesModels;
    public $dokumen;
    public $doc;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dokumen, Dokuman $doc)
    {
        $this->dokumen = $dokumen;
        $this->doc = $doc;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->markdown('email.pages.dokumenbalasan')
                    ->with([
                        'instansi' => $this->doc->nama_instansi,
                    ]);
        foreach($this->dokumen as $dok){
            $path = public_path()."/file_balasan"."/".$dok->file;
            $email->attach($path);
        }

        return $email; 
        // return $this->markdown('email.pages.dokumenbalasan')
        //         ->attach(public_path().'/');
    }
}
