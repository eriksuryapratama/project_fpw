<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PemesananMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $pemesanan;

    public function __construct($inputpemesanan)
    {
        $this->pemesanan = $inputpemesanan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Pemesanan Barang')
        ->from('minimarket@gmail.com','minimarket')
        ->view('emails.pemesanan')
        ->with([
            'pemesanan' => $this->pemesanan,
        ]);
    }
}
