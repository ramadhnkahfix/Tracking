<?php

namespace App\Mail;

use App\Models\Dokuman;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifikasiDokMasuk extends Mailable
{
    use Queueable, SerializesModels;
    public $u;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $u)
    {
        $this->u = $u;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails/dokmasuk')
                    ->with([
                        'nama'=>$this->u->nama,
                    ]);
    }
}
