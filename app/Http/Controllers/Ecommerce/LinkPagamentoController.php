<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLinkPagamento;
use App\Models\CanalComunicacao;
use App\Models\LinkPagamento;
use App\Models\LinkPagamentoComunicacao;
use App\Models\Pagamento;
use App\Models\Perfil;
use App\Models\TipoPagamento;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LinkPagamentoController extends Controller
{
    private static int $expireMinutes = 120;

    public function create(CreateLinkPagamento $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $url = LinkPagamento::gerarLink();

            $idUser    = $request->input("id_user") ?? null;
            $canaisIds = $request->input("channels");

            $link = new LinkPagamento([
                                          "valor"       => $request->input("valor"),
                                          "status"      => LinkPagamento::$criado,
                                          "dt_validade" => Carbon::now()->addMinutes(self::$expireMinutes),
                                          "link"        => $url["id"],
                                          "id_user"     => $idUser,
                                      ]);
            $link->save();
            $link->link_url = $url["url"];

            if ($idUser and $canaisIds) {
                $cliente = User::where("id", $idUser)->first();

                if (is_null($cliente)) {
                    throw new Exception("Cliente não encontrado", 404);
                }

                $canais = CanalComunicacao::whereIn("id", $canaisIds)->where("ativo", true)->get();
                if ($canais->count() <= 0) {
                    throw new Exception("Nenhum canal de comunicação ativo encontrado", 404);
                }

                foreach ($canais as $canal) {
                    $comunicacao = new LinkPagamentoComunicacao([
                                                                    "id_link_pagamento"    => $link->id,
                                                                    "id_canal_comunicacao" => $canal->id,
                                                                ]);

                    $comunicacao->save();
                }
            }

            DB::commit();

            return $this->jsonCreated("Link de pagamento criado com sucesso", $link->toArray());
        } catch (Exception $e) {
            DB::rollback();

            return $this->jsonException($e, $e->getCode());
        }
    }

    public function read(string $link): JsonResponse
    {
        try {
            $row = LinkPagamento::where("link", $link)->first();
            if (is_null($row)) {
                throw new Exception("Link não encontrado");
            }

            if ($row->status == LinkPagamento::$cancelado) {
                throw new Exception("Esse link está cancelado e não pode mais ser pago");
            }

            $row->status_text = LinkPagamento::getStatusText($row->status);

            if ($row->status == LinkPagamento::$pago) {
                $row->pagamento = Pagamento::where("id_link_pagamento", $row->id)->first();
            }

            $row->valor_f        = "R$ " . number_format($row->valor, 2, ",", ".");
            $row->dt_validade_f  = date("d/m/Y H:i", strtotime($row->dt_validade));
            $row->dt_pagamento_f = date("d/m/Y H:i", strtotime($row->dt_pagamento));

            return $this->json(["link" => $row]);
        } catch (Exception $e) {
            return $this->jsonException($e, $e->getCode());
        }
    }

    public function relatorio(Request $request): JsonResponse
    {
        $cols = ["link_pagamento.id", "link_pagamento.link", "link_pagamento.id_user", "link_pagamento.valor", "link_pagamento.status", "link_pagamento.dt_validade", "link_pagamento.dt_pagamento", "perfil_user.nome"];

        try {
            $limit = $request->input("limit") ?? 50;

            $validadeDe  = $request->input("validade_de") ?? now()->subDays(30);
            $validadeAte = $request->input("validade_ate") ?? now()->format('Y-m-d') . " 23:59:59";
            $status      = $request->input("status") ?? [];

            $links = LinkPagamento::select($cols)
                                  ->whereBetween("dt_validade", [$validadeDe, $validadeAte])
                                  ->leftJoin("users", "link_pagamento.id_user", "=", "users.id")
                                  ->leftJoin("perfil_user", "perfil_user.id_user", "=", "users.id")
                                  ->limit($limit)
                                  ->orderByDesc("dt_validade");

            if (count($status) > 0) {
                $links->whereIn("status", $status);
            }

            $links = $links->get()->toArray();

            array_walk($links, function (&$item) {
                $item["valor_f"]        = moedaBr($item["valor"]);
                $item["status_text"]    = LinkPagamento::getStatusText($item["status"]);
                $item["dt_validade_f"]  = date("d/m/Y H:i", strtotime($item["dt_validade"]));
                $item["dt_pagamento_f"] = $item["dt_pagamento"] ? date("d/m/Y H:i", strtotime($item["dt_pagamento"])) : "";
            });

            return $this->json(["links" => $links]);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function pagar(Request $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $link = LinkPagamento::where("link", $request->input("link"))->first();
            if (is_null($link)) {
                throw new Exception("Link não encontrado", 404);
            }

            if ($request->input("valor_pago") != $link->valor) {
                throw new Exception("Valor pago incorreto", 400);
            }

            if (in_array($link->status, [LinkPagamento::$cancelado, LinkPagamento::$expirado])) {
                throw new Exception("Link pagamento cancelado ou expirado", 400);
            }

            if (in_array($link->status, [LinkPagamento::$processandoPagamento, LinkPagamento::$pago])) {
                throw new Exception("Link pagamento já foi pago ou está sendo processado", 400);
            }

            $link->status = LinkPagamento::$processandoPagamento;
            $link->save();

            $tipoPgto = TipoPagamento::where("id", $request->input("tipo_pagamento"))
                                     ->where("ativo", true)
                                     ->first();

            if (is_null($tipoPgto)) {
                throw new Exception("Tipo de pagamento não é aceito", 404);
            }

            // PROCESSAR PAGAMENTO
            $res = $this->processarPagamento($link, $tipoPgto->id);

            if ($res) {
                $link->status = LinkPagamento::$pago;
                $link->save();

                DB::commit();

                return $this->jsonMessage("Pagamento realizado com sucesso");
            }

            DB::commit();

            return $this->jsonMessage("Pagamento está sendo processado.");
        } catch (Exception $e) {
            DB::rollBack();

            return $this->jsonException($e, $e->getCode());
        }
    }

    private function processarPagamento(LinkPagamento $link, int $tipoPgto): bool
    {
        $pagamento = new Pagamento([
                                       "id_tipo_pagamento" => $tipoPgto,
                                       "dt_pagamento"      => now()->format('Y-m-d H:i:s'),
                                       "valor_pago"        => $link->valor,
                                       "id_link_pagamento" => $link->id,
                                   ]);

        $processar = [1, 2];
        if (in_array($tipoPgto, $processar)) {
            $pagamento->save();

            return false;
        }

        $pagamento->aceito = true;

        $pagamento->save();

        return true;
    }

    public function buscarCliente(string $nome): JsonResponse
    {
        try {
            $cols     = ["perfil_user.nome", "perfil_user.id_user"];
            $clientes = Perfil::select($cols)
                              ->where("nome", "ilike", "%" . $nome . "%")
                              ->join("users", "users.id", "=", "perfil_user.id_user")
                              ->limit(10)
                              ->get();

            return $this->json($clientes);
        } catch (Exception $e) {
            DB::rollBack();

            return $this->jsonException($e, $e->getCode());
        }
    }

    public function cancelar(int $id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $link = LinkPagamento::where("id", $id)->first();
            if ($link->status != LinkPagamento::$criado) {
                throw new Exception("Esse link não pode mais ser cancelado", 400);
            }
            $link->status = LinkPagamento::$cancelado;
            $link->save();

            // Cancelar links não enviados
            // Caso exista fila de envio, comunicar cancelamento?
            LinkPagamentoComunicacao::where("id_link_pagamento", $link->id)
                                    ->whereNull("dt_envio")
                                    ->forceDelete();

            DB::commit();

            return $this->jsonCreated("Link de pagamento cancelado", $link->toArray());
        } catch (Exception $e) {
            DB::rollback();

            return $this->jsonException($e, $e->getCode());
        }
    }
}
