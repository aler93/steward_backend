<?php

namespace App\Console\Commands;

use App\Models\LinkPagamentoComunicacao;
use App\Services\Log;
use Illuminate\Console\Command;

class NotifyLinks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'link:notificar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notifica cliente de links criados';

    private $methods = [
        1 => 'enviarEmail',
        2 => 'enviarSms',
        3 => 'enviarTelegram',
        4 => 'enviarWhatsapp',
        5 => 'enviarSinalDeFumaca',
    ];

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cols = ["link_pagamento_comunicacao.id", "link_pagamento_comunicacao.id_canal_comunicacao", "link_pagamento.id_user"];

        $envios = LinkPagamentoComunicacao::select($cols)
                                          ->whereNull("dt_envio")
                                          ->join("link_pagamento", "link_pagamento.id", "link_pagamento_comunicacao.id_link_pagamento")
                                          ->limit(100)
                                          ->get();

        if( count($envios) == 0 ) {
            dd("Sem mensagems para enviar");
        }

        foreach ($envios as $envio) {
            $call = $this->methods[$envio->id_canal_comunicacao] ?? null;
            if( is_null($call) ) {
                $errMsg = "Chamando método inválido. id_canal_comunicacao = $envio->id_canal_comunicacao";

                dump($errMsg);

                $log = new Log("link_pagamento/envio_notificacao_".now()->format('Ymd'));
                $log->gravar($errMsg);

                continue;
            }

            $enviado = $this->$call($envio->id_user);
            /*switch ($envio->id_canal_comunicacao) {
                case 1:
                    $enviado = $this->enviarEmail($envio->id_user);
                    break;
                case 2:
                    $enviado = $this->enviarSms($envio->id_user);
                    break;
                case 3:
                    $enviado = $this->enviarTelegram($envio->id_user);
                    break;
                case 4:
                    $enviado = $this->enviarWhatsapp($envio->id_user);
                    break;
                case 5:
                    $enviado = $this->enviarSinalDeFumaca($envio->id_user);
                    break;
            }*/

            if ($enviado) {
                $update = LinkPagamentoComunicacao::where("id", $envio->id)->first();
                $update->dt_envio = date("Y-m-d H:i:s");
                $update->save();
            }
        }

        return Command::SUCCESS;
    }

    private function enviarEmail(int $idUser)
    {
        dump("Enviando e-mail...");

        return true;
    }

    private function enviarSms(int $idUser)
    {
        dump("Enviando SMS...");

        return true;
    }

    private function enviarTelegram(int $idUser)
    {
        dump("Enviando mensagem por Telegram...");

        return true;
    }

    private function enviarWhatsapp(int $idUser)
    {
        dump("Enviando mensagem por Whatsapp...");

        return true;
    }

    private function enviarSinalDeFumaca(int $idUser)
    {
        dump("Quê??");

        return true;
    }
}
