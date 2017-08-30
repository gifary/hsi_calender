<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Konfirmasi extends Mailable
{
    use Queueable, SerializesModels;

    public $order_history;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order_history)
    {
        $this->order_history = $order_history;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.konfirmasi.index');
    }
}
