<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Province;
use App\City;

class OrderShipped extends Mailable
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
        $this->order_history =$order_history;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = url('/konfirmasi/'.$this->order_history->no_invoice);
        return $this->markdown('emails.orders.shipped')->with([
            'city' => City::find($this->order_history->city_id),
            'province' => Province::find($this->order_history->province_id),
            'action_url' => $url
        ]);
    }
}
