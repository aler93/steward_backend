<?php

namespace App\Http\Controllers\Abastecimento;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReabastecimentoCadastro;
use App\Models\Abastecimento;
use App\Models\Carro;
use App\Repositories\CarroRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

class ReabastecimentoController extends Controller
{
    private CarroRepository $carroRepository;

    public function __construct(CarroRepository $carroRepository)
    {
        $this->carroRepository = $carroRepository;
    }

    public function cadastrar(ReabastecimentoCadastro $request): JsonResponse
    {
        try {
            $carro = $this->carroRepository->carroPorUuid($request->input("uuid_carro"));

            $data          = array_merge($request->all(), [
                "id_carro" => $carro->id,
            ]);

            if( is_null($data["data"]) ) {
                $data["data"] = now();
            }

            $abastacimento = new Abastecimento($data);
            $abastacimento->save();

            return $this->jsonCreated("Reabastecimento salvo", $abastacimento->toArray());
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function listar(string $uuidCarro): JsonResponse
    {
        try {
            $carro          = $this->carroRepository->carroPorUuid($uuidCarro);
            $abastacimentos = Abastecimento::where("id_carro", "=", $carro->id)->get();

            return $this->json(["abastecimentos" => $abastacimentos]);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }
}
