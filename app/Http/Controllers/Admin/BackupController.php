<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\BackupRepository;
use Illuminate\Support\Facades\Storage;
use App\Models\CategoriaProduto;

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
        $str = $this->repository->sqlDataToPhp($categorias);

        Storage::put("/bkp/categorias_produtos.php", $str);

        echo $str;
    }
}
