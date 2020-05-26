<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Competidor;
class MensajeRecibido extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = 'Formulario Gran Fondo 500';
    public $competidor;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Competidor $competidor)
    {
        $this->competidor = $competidor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.mensaje-recibido');
    }
}
