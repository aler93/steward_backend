<?php

namespace App\Services;

use DB;
use Exception;
use Illuminate\Support\Facades\Storage;

class Cache
{
    private Log $log;

    public function __construct()
    {
        $today = date("Ymd");
        $this->log = new Log("cache_$today.log");
    }

    public function gravarJson(string $key, $value): void
    {
        $object = [$key => $value];

        Storage::disk("local")->put("CacheItems/" . $key . ".json", json_encode($object));
    }

    public function tableToTrait(string $table): void
    {
        try{
            $rows = DB::table($table)->get()->toArray();

            $text = $this->makeText($table . "Cache", $rows);

            dd($text);
        } catch(Exception $e){
            $this->log->gravar($e->getMessage() . "\n" . $e->getTraceAsString());
            dd($e);
        }
    }

    private function makeText(string $traitName = "Cache", array $rows = []): string
    {
        $file = "<?php\n\n";
        $file .= "trait $traitName{\n";

        foreach( $rows as $col => $val) {
            $file .= "\t" . $col . " = " . $val . "\n";
        }

        $file .= "}\n";

        return $file;
    }
}
