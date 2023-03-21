<?php

namespace App\Http\Controllers\Abastecimento;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarroCadastro;
use App\Models\Carro;
use App\Repositories\CarroRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

class CarrosController extends Controller
{
    private CarroRepository $repository;

    public function __construct(CarroRepository $carroRepository)
    {
        $this->repository = $carroRepository;
    }

    public function cadastrar(CarroCadastro $request): JsonResponse
    {
        try {
            if ($request->input("id_transmissao")) {
                if (!$this->repository->validarIdTransmissao($request->input("id_transmissao"))) {
                    return $this->jsonMessage("O tipo de transmissão selecionado é inválido", 422);
                }
            }

            $data = array_merge($request->all(), [
                "id_user" => $request->user()->id,
                "uuid"    => uuid(),
            ]);

            $carro = new Carro($data);
            $carro->save();

            return $this->jsonCreated("Carro cadastrado", $carro->toArray());
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function listar(Request $request): JsonResponse
    {
        try {
            $carros = Carro::where("id_user", "=", $request->user()->id)->get();

            return $this->json(["Carros" => $carros]);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function detalhar(string $uuid): JsonResponse
    {
        try {
            $carro = Carro::where("uuid", "=", $uuid)->with("transmissao")->first();

            return $this->json(["Carro" => $carro]);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function atualizar(CarroCadastro $request, string $uuid): JsonResponse
    {
        try {
            if ($request->input("id_transmissao")) {
                if (!$this->repository->validarIdTransmissao($request->input("id_transmissao"))) {
                    return $this->jsonMessage("O tipo de transmissão selecionado é inválido", 422);
                }
            }

            $carro = $this->repository->carroPorUuid($uuid);
            $carro->update($request->all());

            return $this->jsonCreated("Carro atualizado", $carro->toArray());
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function deletar(string $uuid): JsonResponse
    {
        try {
            $carro = $this->repository->carroPorUuid($uuid);
            $carro->forceDelete();

            return $this->jsonNoContent();
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function getMain(Request $request)
    {
        $idUser = $request->user()->id;

        try {
            $carro = Carro::where("id_user", "=", $idUser)->where("principal", "=", true)->first();

            return $this->json(["carro" => $carro]);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }
}
