<?php

namespace App\Http\Controllers;

use App\Models\UserAbastecimento;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserVehicleController extends Controller
{
    public function __construct()
    {
        //sleep(2);
    }

    public function create(Request $request)
    {
        try {
            $data = $request->all();

            if (strlen($request->input("veiculo", "")) <= 0) {
                throw new \Exception("Digite a marca e modelo do veículo");
            }

            DB::beginTransaction();

            if ($request->input("principal", false)) {
                Veiculo::where("id_user", "=", $request->user()->id)->update(["principal" => false]);
            }

            $v = new Veiculo([
                                 "id_user"   => $request->user()->id,
                                 "carro"     => $data["veiculo"],
                                 "descricao" => $data["descricao"] ?? null,
                                 "principal" => $request->input("principal", false),
                             ]);
            $v->save();

            DB::commit();

            return $this->jsonCreated("Veículo cadastrado com sucesso", $v->toArray());
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->jsonException($e);
        }
    }

    public function getMyCars(Request $request)
    {
        try {
            $v = Veiculo::where("id_user", "=", $request->user()->id)
                        ->orderByDesc("created_at")
                        ->orderByDesc("deleted_at")
                        ->get()
                        ->toArray();

            array_walk($v, function (&$carro) {
                $limitStr            = 50;
                $carro["descricao_"] = $carro["descricao"];
                if (strlen($carro["descricao"]) > $limitStr + 3) {
                    $carro["descricao_"] = substr($carro["descricao"], 0, $limitStr) . "...";
                }
            });

            return $this->json([
                "vehicles" => $v,
                "total"    => count($v),
            ]);
        } catch (\Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function myMainCar(Request $request)
    {
        try {
            $v = Veiculo::where("id_user", "=", $request->user()->id)
                        ->where("principal", true)
                        ->first();

            return $this->json([
                "vehicle" => $v
            ]);
        } catch (\Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function changeMainCar(int $id, Request $request)
    {
        try {
            DB::beginTransaction();
            $v = Veiculo::where("id_user", "=", $request->user()->id)
                        ->update(["principal" => false]);

            // SETAR PRINCIPAL
            $main            = Veiculo::where("id", "=", $id)->first();
            $main->principal = true;
            $main->save();

            DB::commit();

            return $this->json($v);
        } catch (\Exception $e) {
            DB::rollBack();

            return $this->jsonException($e);
        }
    }

    public function remove(int $id, Request $request)
    {
        try {
            DB::beginTransaction();
            $v = Veiculo::where("id_user", "=", $request->user()->id)
                        ->where("id", "=", $id)
                        ->update(["deleted_at" => now()]);

            DB::commit();

            return $this->json($v);
        } catch (\Exception $e) {
            DB::rollBack();

            return $this->jsonException($e);
        }
    }

    public function abastecer(Request $request)
    {
        try {
            DB::beginTransaction();
            $v = Veiculo::where("id_user", "=", $request->user()->id)
                        ->where("principal", "=", true)
                        ->first();

            if (is_null($v)) {
                throw new \Exception("Nenhum carro selecionado para abastecimento", 409);
            }

            if( $request->input("litros") <= 0 ) {
                throw new \Exception("Zero litros", 400);
            }
            if( $request->input("km") <= 0 ) {
                throw new \Exception("Zero km", 400);
            }

            $abast = new UserAbastecimento([
                                               "id_carro"    => $v->id,
                                               "km"          => $request->input("km"),
                                               "litros"      => $request->input("litros"),
                                               "total_pago"  => $request->input("total_pago", 0.0),
                                               "preco_litro" => $request->input("preco_litro", 0.0),
                                               "descricao"   => $request->input("notas"),
                                           ]);
            $abast->save();

            DB::commit();

            return $this->json($abast);
        } catch (\Exception $e) {
            DB::rollBack();

            return $this->jsonException($e);
        }
    }

    public function abastecimentos(Request $request)
    {
        try {
            $v = Veiculo::where("id_user", "=", $request->user()->id)
                        ->where("principal", "=", true)
                        ->first();

            if (is_null($v)) {
                throw new \Exception("Nenhum carro selecionado para abastecimento", 409);
            }

            $abast = UserAbastecimento::where("id_carro", "=", $v->id)
                                      ->orderByDesc("created_at")
                                      ->limit(60)
                                      ->get()
                                      ->toArray();

            array_walk($abast, function (&$a) {
                $a["km_l"]   = $a["km"] / $a["litros"];
                $a["km_l_f"] = number_format($a["km"] / $a["litros"], 2, ",", ".") . " km/l";
                $a["date"]   = date("Y-m-d", strtotime($a["created_at"]));
                $a["date_f"] = date("d/m/Y", strtotime($a["created_at"]));

                $notas = $a["descricao"];
                if (strlen($notas) > 37) {
                    $notas = substr($notas, 0, 37) . "...";
                }
                $a["notas"] = $notas;
            });

            return $this->json($abast);
        } catch (\Exception $e) {
            DB::rollBack();

            return $this->jsonException($e);
        }
    }

    public function removerAbastecimento(int $id, Request $request)
    {
        try {
            // Check ownership
            $abast = UserAbastecimento::select(["users.id", "users.email"])
                                      ->where("user_abastecimentos.id", "=", $id)
                                      ->join("user_carros", "user_carros.id", "=", "user_abastecimentos.id_carro")
                                      ->join("users", "user_carros.id_user", "=", "users.id")
                                      ->first();

            if($abast->id != $request->user()->id) {
                throw new \Exception("Ação proibida", 401);
            }

            $delete = UserAbastecimento::where("user_abastecimentos.id", "=", $id)->forceDelete();

            return $this->jsonNoContent();
        } catch (\Exception $e) {
            return $this->jsonException($e);
        }
    }
}
