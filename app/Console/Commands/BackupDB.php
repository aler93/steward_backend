<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Repositories\BackupRepository;
use Illuminate\Support\Facades\Storage;

class BackupDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'steward:backupDB';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read all tables and saves as PHP arrays';

    private array $skip = ["migrations", "password_resets", "failed_jobs", "personal_access_tokens"];
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $repo = new BackupRepository();
        $date = date("Y-m-d_H-i-s");

        $tables = DB::select("SELECT * FROM pg_catalog.pg_tables WHERE schemaname='public'");

        foreach( $tables as $t ) {
            if( in_array($t->tablename, $this->skip) ) {
                continue;
            }

            $select = DB::table($t->tablename)->select()->get();

            $strPhp  = $repo->sqlDataToPhp($select);
            $filePhp = $t->tablename . ".php";
            Storage::put("bkp/php/" . $date . "/" . $filePhp, $strPhp);

            $fileJson = $t->tablename . ".json";
            $strJson  = $repo->sqlToJson($select);
            Storage::put("bkp/json/" . $date . "/" . $fileJson, $strJson);
        }

        return Command::SUCCESS;
    }
}
