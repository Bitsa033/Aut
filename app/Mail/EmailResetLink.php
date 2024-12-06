<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class EmailResetLink extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public  $url, $email, $sub, $mess;
    public function __construct($email, $url)
    {
        $this->email = $email;
        $this->url = $url;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->email, $this->email),
            replyTo: [
                new Address('Bitsapascal033@gmail.com', 'Bitsapascal033@gmail.com'),
            ],
            subject: 'Réinitialisation du mot de passe',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.password.reset',
            with: [
                'url' => $this->url
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
