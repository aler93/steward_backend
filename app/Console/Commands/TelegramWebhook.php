<?php

namespace App\Console\Commands;

use App\Models\EnvioMensagem;
use App\Models\Perfil;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class TelegramWebhook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:save';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Salva novos contatos do chatbot do Telegram no banco';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //https://api.telegram.org/bot6352070089:AAGT-cNNJmHq_EILr-PHnquehDUbKKG-RGo/getUpdates

        $r = Http::get("https://api.telegram.org/bot" . env("TELEGRAM_BOT") . "/getUpdates");

        $body = json_decode($r->getBody(), 1);
        if( !$body["ok"] ) {
            dump("Erro ao ler informações do bot. ", $body);

            return Command::FAILURE;
        }
        $msgs = $body["result"];
        foreach( $msgs as $msg ) {
            if( str_contains($msg["message"]["text"], "/save") and strlen($msg["message"]["text"]) > 5 ) {
                $email = explode(" ", $msg["message"]["text"]);
                if( count($email) >= 2 ) {
                    $email = $email[1];

                    $user = User::where("email", "=", $email)->first();

                    if( is_null($user) ) {
                        continue;
                    }
                    $perfil = Perfil::where("id_user", "=", $user->id)->first();

                    $chatId = $msg["message"]["from"]["id"];
                    $perfil->telegram_chatid = $chatId;
                    $perfil->save();

                    $confirmar = new EnvioMensagem([
                        "canal"    => "telegram",
                        "destino"  => $chatId,
                        "mensagem" => "Chat do Telegram salvo com sucesso!",
                    ]);

                    $confirmar->save();
                }
            }
        }

        return Command::SUCCESS;
    }
}
