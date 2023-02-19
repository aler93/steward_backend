<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\BackupRepository;
use Illuminate\Support\Facades\Storage;
use App\Models\CategoriaProduto;
use Exception;

class BackupController extends Controller
{
    private BackupRepository $repository;

    public function __construct(BackupRepository $backupRepository)
    {
        $this->repository = $backupRepository;
    }

    public function categoriaProdutos()
    {
        $categorias = CategoriaProduto::all();
        $str        = $this->repository->sqlDataToPhp($categorias);

        Storage::put("/bkp/categorias_produtos.php", $str);

        echo $str;
    }

    public function readDir(Request $request)
    {
        $dir = $request->input("dir");
        try {
            $d = Storage::directories($dir);
            $f = Storage::files($dir);

            $storage = ["directories" => $d, "files" => $f];
            return $this->json($storage);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function readFile(Request $request)
    {
        $file = $request->input("dir");

        try {
            $f = Storage::get($file);

            $storage = ["content" => $f, "file" => $file];
            return $this->json($storage);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }
}
