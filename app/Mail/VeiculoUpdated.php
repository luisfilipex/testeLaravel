<?php

namespace App\Mail;

use App\Models\Veiculo;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
class VeiculoUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $veiculo;

    /**
     * Create a new message instance.
     *
     * @param Veiculo $veiculo
     * @return void
     */
    public function __construct(Veiculo $veiculo)
    {
        $this->veiculo = $veiculo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::info('VeiculoUpdated build method called');

        try {
            Log::info('Tentando carregar a view emails.test');
            return $this->view('emails.test');
        } catch (\Exception $e) {
            Log::error('Erro ao construir e-mail: ' . $e->getMessage());
            throw $e;
        }
    }
}
