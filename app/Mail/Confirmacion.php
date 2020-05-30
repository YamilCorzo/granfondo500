<?php

namespace App\Mail;

use App\Competidor;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Confirmacion extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = 'Confirmación de Inscripción';
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
        return $this->view('emails.confirmacion');
    }
}
