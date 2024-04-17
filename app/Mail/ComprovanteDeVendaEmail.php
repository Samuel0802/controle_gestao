<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ComprovanteDeVendaEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData; //retorno dos dados que vai passar

   
    public function __construct($mailData)
    {
     $this->mailData = $mailData;
    }

   
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Comprovante De Venda Email',
        );
    }

    public function content(): Content
    {
        return new Content(// Retornar o caminho da view aqui
            view: 'email.comprovante_venda',
        );
    }

    
    public function attachments(): array
    {
        return [];
    }
}
