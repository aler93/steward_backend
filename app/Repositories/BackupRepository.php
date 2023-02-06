<?php

namespace App\Repositories;

use App\Models\ListaUser;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\CategoriaProduto;

class BackupRepository
{
    public function sqlDataToPhp($tableData): string
    {
        //$tableData = CategoriaProduto::all()->toArray();

        //dd($tableData);

        $bkp = "<?php\n\n\$data = [\n";

        foreach( $tableData as $row ) {
            $bkp .= "\t[\n";
            foreach( $row as $col => $val ) {
                $bkp .= "\t\t\"" . $col . "\" => " . $this->setValStr($val) . ",\n";
            }

            $bkp .= "\t],\n";
        }

        $bkp .= "];\n";

        return $bkp;
    }

    public function sqlToJson($tableData): string
    {
        return json_encode($tableData);
    }

    private function setValStr($value) 
    {
        if( is_string($value) ) {
            return "\"" . $value . "\"";
        }
        if( is_null($value) ) {
            return 'null';
        }
        if( strlen($value) <= 0 ) {
            return '""';
        }

        return $value;
    }
}
