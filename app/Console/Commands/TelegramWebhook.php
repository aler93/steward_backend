<?php

namespace App\Console\Commands;

use App\Models\EnvioMensagem;
use App\Models\Perfil;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Storage;

class TelegramWebhook extends Command
{
    private string $file = "/webhook/telegram.json";

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
        $lastUpdate = $this->lastMessage();

        $r = Http::get("https://api.telegram.org/bot" . env("TELEGRAM_BOT") . "/getUpdates");

        $body = json_decode($r->getBody(), 1);
        if( !$body["ok"] ) {
            dump("Erro ao ler informações do bot. ", $body);

            return Command::FAILURE;
        }
        $msgs = $body["result"];
        foreach( $msgs as $msg ) {
            if( $msg["update_id"] <= $lastUpdate ) {
                dump("Skipping " . $msg["update_id"]);
                continue;
            }

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

            Storage::disk("local")->put($this->file, json_encode(["update_id" => $msg["update_id"]]));
        }

        return Command::SUCCESS;
    }

    private function lastMessage()
    {
        $txt = Storage::disk("local")->get($this->file);

        if( is_null($txt) ) {
            return 0;
        }
        $json = json_decode($txt);

        if( !isset($json->update_id) ) {
            return 0;
        }

        return $json->update_id;
    }
}
