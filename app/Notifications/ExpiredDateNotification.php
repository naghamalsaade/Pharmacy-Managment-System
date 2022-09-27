<?php

namespace App\Notifications;

use App\Models\BuyBillProduct;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\BookIn;


class ExpiredDateNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

     private $book;


    public function __construct(BuyBillProduct $book)
    {
        $this->book = $book;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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

     public function toDatabase($notifiable)
    {
        return [
            'title' => 'Date Expired Product',
            'batch_id' => $this->book->id,
            'amount' =>  BookIn::find($this->book->id)->amount,
            'expired_date' => $this->book->expired_date,
            'description' => 'This Batch has expired, '. $this->book->expired_date,
        ];
    }
}
