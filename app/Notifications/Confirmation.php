<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Confirmation extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ["mail"];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $checkin = $this->reservation->check_in;
        $checkout = $this->reservation->check_out;

        return (new MailMessage())
            ->subject("Reservation Confirmation")
            ->greeting(
                "Dear Mr/Mrs " . $this->reservation->guest->last_name . ","
            )
            ->line(
                "Thank you for your reservation at Molveno Resort. These are the details of your reservation."
            )
            ->line("Check in date: " . $checkin->format("d-m-Y H:i"))
            ->line("Check out date: " . $checkout->format("d-m-Y H:i"))
            ->line("Adults: " . $this->reservation->adults)
            ->line("Children: " . $this->reservation->children)
            ->line("Total price: €" . $this->reservation->total_price)

            // ->action("Notification Action", url("/"))
            ->line("We look forward to seeing you at Molveno Resort!")
            ->salutation("Kind Regards - Molveno Resort")
            ->line("Molveno Resort")
            ->line("Via Bettega 18, 38018 Molveno TN, Italy")
            ->line("Phone: +390461586934")
            ->line("info@molvenoresort.com");
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
