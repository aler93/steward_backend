<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Sistema\SistemaController;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;

class BackupDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'steward:backup-db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Realiza backup do banco de dados em formato JSON';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $pwd = new Process(["pwd"]);
        $pwd->run();
        $fPath = rtrim($pwd->getOutput(), "\n");
        $fPath = storage_path() . $fPath . "/system";


        //$proc = new Process(["chmod", "777", $fPath, "-R"]);
        //$proc->run();
        //dd($proc->isSuccessful());

        $sys = new SistemaController();
        $r = $sys->backupDB();

        dump(["success" => true]);

        return Command::SUCCESS;
    }
}
