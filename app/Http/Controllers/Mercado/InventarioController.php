<?php

namespace App\Http\Controllers\Mercado;

use App\Http\Controllers\Controller;
use App\Repositories\InventarioRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

class InventarioController extends Controller
{
    private InventarioRepository $repository;

    public function __construct(InventarioRepository $repository)
    {
        $this->repository = $repository;
    }

    public function cadastrar(Request $request): JsonResponse
    {
        try {
            $produtos = $request->input("produtos");
            $invalidos = $this->repository->validarUnidades($produtos);

            if( count($invalidos) > 0 ) {
                throw new Exception("Produtos com unidades inválidas: " . implode(", ", $invalidos), 422);
            }

            $this->repository->cadastrarInventario($produtos, $request->user()->id);

            return $this->jsonCreated("Produtos cadastrados no inventário", $produtos);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }
}
