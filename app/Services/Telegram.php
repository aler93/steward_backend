<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;

class Telegram
{
    private string $key;
    private string $url = "https://api.telegram.org/bot";

    public array $respHeaders = [];
    public string $respBody = "";

    public function __construct()
    {
        $token = env("TELEGRAM_BOT");
        if( strlen($token) <= 0 ) {
            throw new Exception("Tentando usar Telegram sem chave do Bot", 503);
        }

        $this->key = $token;
    }

    public function enviar(string $chatId, string $message): int
    {
        if( strlen($chatId) <= 0 ) {
            return 400;
        }
        if( strlen($message) <= 0 ) {
            return 422; 
        }

        $url = $this->url . $this->key . "/sendMessage?chat_id=" . $chatId . "&text=" . $message;
        $r = Http::get($url);

        $this->respHeaders = $r->headers();
        $this->respBody = $r->body();

        if( env("APP_DEBUG") ) {
            $response = "Status: " . $r->status() . "\n";
            $response .= "Headers:\n" . json_encode($r->headers()) . "\n";
            $response .= "Body:\n" . $r->body();

            $log = new Log("telegram_" . $chatId . "_" . now()->format("Ydm_His"));
            $log->gravar($response);
        }

        return $r->status();
    }
}
