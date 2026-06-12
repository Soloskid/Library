<?php

namespace App\Mail;

use App\Models\BookRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookRequestFulfilled extends Mailable
{
    use Queueable, SerializesModels;

    public $bookRequest;

    public function __construct(BookRequest $bookRequest)
    {
        $this->bookRequest = $bookRequest;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Book Request Has Been Fulfilled!',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.book-request-fulfilled',
        );
    }
}