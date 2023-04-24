<?php

namespace App\Http\Controllers\Abastecimento;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReabastecimentoCadastro;
use App\Models\Abastecimento;
use App\Models\Carro;
use App\Models\Lookup;
use App\Models\RequisicoesDelete;
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

            $data = array_merge($request->all(), [
                "id_carro" => $carro->id,
            ]);

            if (is_null($data["data"])) {
                $data["data"] = now();
            }

            $abastacimento = new Abastecimento($data);
            $abastacimento->save();

            return $this->jsonCreated("Reabastecimento salvo", $abastacimento->toArray());
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function listar(string $uuidCarro, Request $request): JsonResponse
    {
        $limit  = $request->input("limit") ?? 15;
        $offset = $request->input("offset") ?? 0;
        $dt_de  = $request->input("dt_de") ?? null;
        $dt_ate = $request->input("dt_ate") ?? null;

        try {
            $carro          = $this->carroRepository->carroPorUuid($uuidCarro);
            if( $dt_de && $dt_ate ) {
                $abastacimentos = Abastecimento::where("id_carro", "=", $carro->id)
                                               ->where("data", ">=", $dt_de)
                                               ->where("data", "<=", $dt_ate)
                                               ->limit($limit)
                                               ->get();
            } else {
                $abastacimentos = Abastecimento::where("id_carro", "=", $carro->id)
                                               ->limit($limit)
                                               ->offset($offset)
                                               ->get();
            }

            foreach ($abastacimentos as &$row) {
                $row->km_l = numFormatBr($row->km / $row->litros) . " Km/l";

                $row->km_f             = numFormatBr($row->km) . " Km";
                $row->litros_f         = numFormatBr($row->litros) . " L";
                $row->data_f           = date("d/m/Y", strtotime($row->data));
                $row->custo_gasolina_f = "Não informado";

                if( $row->custo_gasolina ) {
                    $row->custo_gasolina_f = "R$ " . numFormatBr($row->custo_gasolina);
                }
            }

            return $this->json(["abastecimentos" => $abastacimentos]);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function detalhe(int $idAbastecimento): JsonResponse
    {
        try {
            $abastacimento = Abastecimento::where("id", "=", $idAbastecimento)->with('carro')->first();

            $abastacimento->km_f             = numFormatBr($abastacimento->km) . " km";
            $abastacimento->litros_f         = numFormatBr($abastacimento->litros) . " L";
            $abastacimento->custo_gasolina_f = $abastacimento->custo_gasolina ? "R$ " . numFormatBr($abastacimento->custo_gasolina) : "Não informado";

            return $this->json(["abastecimento" => $abastacimento]);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function requisitarDelete(Request $request): JsonResponse
    {
        try {
            $idUser = $request->user()->id;

            $delete = [
                "tabela"       => $request->input("tabela"),
                "coluna"       => $request->input("coluna"),
                "coluna_valor" => $request->input("coluna_valor"),
                "id_user"      => $request->user()->id,
            ];

            $check = RequisicoesDelete::where("id_user", "=", $idUser)
                                      ->where("coluna", "=", $delete["coluna"])
                                      ->where("coluna_valor", "=", $delete["coluna_valor"])
                                      ->where("tabela", "=", $delete["tabela"])
                                      ->first();
            if (!is_null($check)) {
                return $this->jsonMessage("Essa requisição já está cadastrada", 409);
            }

            $req = new RequisicoesDelete($delete);
            $req->save();

            return $this->jsonNoContent();
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function listarTransmissoes(): JsonResponse
    {
        try {
            $transmissoes = Lookup::where("id_externo", "=", "transmissao")->get();

            return $this->json(["transmissoes" => $transmissoes]);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }
}
