<?php

namespace App\Mail;

use App\Models\Dokuman;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifikasiPengembalianDok extends Mailable
{
    use Queueable, SerializesModels;
    public $dokumen;
    public $doc;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Dokuman $dokumen, $doc)
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
        $email=$this->markdown('email/pengembaliandok')
                    ->with([
                        'alasan' => $this->dokumen->alasan,
                        'nama' => $this->dokumen->nama_instansi,
                    ]);
                    foreach($this->doc as $d){
                        $path = public_path()."/document"."/".$d->file;
                        $email->attach($path);
                    }
        return $email;
    }
}
