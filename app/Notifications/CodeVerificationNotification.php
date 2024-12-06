<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CodeVerificationNotification extends Notification
{
    use Queueable;
    public $code;
    public $email;

    /**
     * Create a new notification instance.
     */
    public function __construct($email, $code)
    {
        $this->email = $email;
        $this->code = $code;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("Code de vérification")
            ->line('Veuillez saisir le code suivant pour vérifier votre email: ' . $this->code)
            ->line('Nous vous remercions pour votre fidelité.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
