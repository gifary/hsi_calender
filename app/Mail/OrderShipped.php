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
        return $this->markdown('emails.orders.shipped')->with([
            'city' => City::find($this->order_history->city_id),
            'province' => Province::find($this->order_history->province_id)
        ]);
        // $url = url('/transaction/recruitmen/download_cv/'.$this->recruitment->p_recruitment_id);
        // $detail = url('/transaction/recruitmen/'.$this->recruitment->m_lokasi_id);
        // return $this->markdown('emails.orders.shipped')->with([
        //                 'action_url' => $url,
        //                 'action_detail' => $detail
        //             ]);;
    }
}
