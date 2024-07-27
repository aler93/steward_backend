<?php

namespace App\Console\Commands;

use App\Models\LinkPagamento;
use App\Services\Log;
use Illuminate\Console\Command;

class LinkExpirados extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'link:expirados';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Procura links de pagamento que já tenha passado a data de expiração e atualiza o status';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now        = now();
        $cancelados = [];
        $links      = LinkPagamento::where("dt_validade", "<", $now)
                                   ->where("status", "=", LinkPagamento::$criado)
                                   ->limit(500)
                                   ->get();

        if( $links->count() == 0 ) {
            dd("Sem links expirados");
        }

        foreach ($links as $link) {
            $link->status = LinkPagamento::$expirado;
            $link->save();

            $cancelados[] = ["id" => $link->id, "dt_cancelamento" => $now->format("Y-m-d H:i:s")];
        }

        dump("Links cancelados:", $cancelados);

        $log = new Log("link_pagamento/links_cancelados_" . now()->format("Ymd_His"));
        $log->gravar(json_encode($cancelados));

        return Command::SUCCESS;
    }
}
