<?php

namespace App\Console\Commands;

use App\Models\CategoriaProduto;
use App\Services\Log;
use Illuminate\Console\Command;

class HigienizarBancoDeDados extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "higienizar:db";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Varre tabelas do banco de dados limpando valores ilegais';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $log = new Log("higienizador");
        $log->gravar("Iniciando higienizador");

        CategoriaProduto::where("nome", "=", "")->forceDelete();

        return Command::SUCCESS;
    }
}
