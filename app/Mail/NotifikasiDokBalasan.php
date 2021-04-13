<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\DokumenSelesai;

class NotifikasiDokBalasan extends Mailable
{
    use Queueable, SerializesModels;

    public $dokumen;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(DokumenSelesai $dokumen)
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
        $attachments = [];
        foreach($this->dokumen->file as $file){
            $attachments[] = public_path()."/file_balasan"."/".$file;
        }

        return $this->markdown('email.pages.dokumenbalasan')->with(['file' => $attachments]);
    }
}
