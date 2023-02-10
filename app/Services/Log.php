<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class Log
{
    public string $arquivo = "";

    public function __construct(string $nomeArquivo = "")
    {
        if( strlen($nomeArquivo) <= 0 ) {
            $nomeArquivo = date("Y-m-d") . ".log";
        }
        if( count(explode(".", $nomeArquivo)) <= 1 ) {
            $nomeArquivo = $nomeArquivo . ".log";
        }

        $this->arquivo = $nomeArquivo;
    }

    public function gravar(string $msg, bool $gravarHora = true): void
    {
        $text = str_repeat("=", 120) . "\n";

        if( $gravarHora ) {
            $text .= "Timestamp: " . date("d/m/Y H:i:s") . "\n";
        }

        $text .= $msg . "\n" . str_repeat("=", 120) . "\n";

        Storage::disk("local")->append($this->arquivo, $text);
    }
}
