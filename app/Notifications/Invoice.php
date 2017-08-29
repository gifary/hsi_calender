<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Invoice extends Notification
{
    use Queueable;

    public $order_history;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order_history)
    {
        $this->order_history = $order_history;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/transaction/recruitmen/download_cv/'.$this->recruitment->p_recruitment_id);

        return (new MailMessage)
                ->subject('Pelamar Baru!')
                ->greeting('Hello,')
                ->line('Kode Pelamar'.$this->recruitment->kode)
                ->line('Nama'.$this->recruitment->nama_lengkap)
                ->line('Ekpekstasi Gajih'.$this->recruitment->salary)
                ->line('Email'.$this->recruitment->email)
                ->action('Download CV', $url);
                //->to("recruitment@sas-hospitality.com");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
