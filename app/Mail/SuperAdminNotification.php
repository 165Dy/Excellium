<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SuperAdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $templateData;
    public $actionType;

    /**
     * Create a new message instance.
     */
    public function __construct(array $templateData, string $actionType)
    {
        $this->templateData = $templateData;
        $this->actionType = $actionType;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "🔔 Nouvelle action utilisateur : {$this->actionType}",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.super-admin-notification',
            with: $this->templateData,
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

    /**
     * Build the message avec le template Mailgun
     */
    public function build()
    {
        return $this->subject("🔔 Nouvelle action utilisateur : {$this->actionType}")
                    ->view('emails.super-admin-notification')
                    ->with($this->templateData);
    }
}
