<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;
use DB;

class SistemaController extends Controller
{
    private array $noBackup = ["failed_jobs", "personal_access_tokens"];

    public function backupDb(bool $dateTime = false)
    {
        try{
            $tables = $this->getTables();
            $backup = [];
            foreach( $tables as &$table ) {
                $backup[$table] = $this->getData($table);
            }

            $bkpDate = now()->format("Ymd");
            if( $dateTime ) {
                $bkpDate = now()->format("YmdHis");
            }

            Storage::put("system/dbSnap_$bkpDate.json", json_encode($backup));

            return $this->json([
                "success" => true,
                "backup" => $backup,
            ]);
        } catch ( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    private function getData(string $table): array
    {
        return DB::select("SELECT * FROM $table");
    }

    /**
     * PostgreSQL only
     * @return array
     */
    private function getTables(): array
    {
        $toBackup = [];

        $tables = DB::select('SELECT * FROM pg_catalog.pg_tables'); 
        foreach( $tables as $tab ) {
            if($tab->tablespace == "pg_global") {
                continue;
            }

            $pre = substr($tab->tablename, 0, 3);
            if( $pre == "pg_" or $pre == "sql" ) {
                continue;
            }

            if( in_array($tab->tablename, $this->noBackup) ) {
                continue;
            }

            $toBackup[] = $tab->tablename;
        }

        return $toBackup;
    }
}
