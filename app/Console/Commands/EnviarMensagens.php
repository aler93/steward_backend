<?php

namespace App\Console\Commands;

use App\Models\EnvioMensagem;
use App\Services\Telegram;
use Illuminate\Console\Command;

class EnviarMensagens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mensagens:enviar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia mensagens pendentes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->enviarTelegram();

        return Command::SUCCESS;
    }

    private function enviarTelegram()
    {
        $telegram = new Telegram();
        $msgs = EnvioMensagem::whereNull("enviado")
                             ->where("canal", "=", "telegram")
                             ->get();

        foreach( $msgs as $msg ) {
            dump("Enviando mensagem para $msg->destino");
            $telegram->enviar($msg->destino, $msg->mensagem);

            $msg->enviado = now();
            $msg->save();
        }
    }
}
