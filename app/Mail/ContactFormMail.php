<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $phone;
    public $email;
    public $message;

       /**
     * Create a new message instance.
     *
     * @param string $name
     * @param string $phone
     * @param string $email
     * @param string $message
     */

    /**
     * Create a new message instance.
     */
    public function __construct($name, $phone, $email, $message)
    {
        $this->name = $name;
        $this->phone = $phone; // Corrected to $this->phone
        $this->email = $email;
        $this->message = $message;
    }
    

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact-form')
                    ->subject('Contact Form Mail');
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Form Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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
