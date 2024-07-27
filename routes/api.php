<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/user", ['App\Http\Controllers\UserController', "cadastrar"]);
Route::get("/user", ['App\Http\Controllers\UserController', "listar"])->middleware("jwt:admin");
Route::get("/user/{uuid}", ['App\Http\Controllers\UserController', "buscar"]);
Route::put("/user/{uuid}", ['App\Http\Controllers\UserController', "atualizar"]);
Route::patch("/user/{uuid}", ['App\Http\Controllers\UserController', "admin"]);
Route::delete("/user/{uuid}", ['App\Http\Controllers\UserController', "remover"])->middleware("jwt:self");

Route::post("/login", ["App\Http\Controllers\LoginController", "login"]);
Route::post("/logout", ["App\Http\Controllers\LoginController", "logout"]);
Route::post("/refresh", ["App\Http\Controllers\LoginController", "refresh"]);
Route::get("/get-me", ["App\Http\Controllers\LoginController", "getMe"]);

// Listas de mercados e etc.
Route::prefix("/mercado")->group(function () {
    Route::middleware('jwt:self')->group(function () {
        Route::post("/lista/{uuid_user}", ["App\Http\Controllers\Mercado\ListaController", "cadastrarLista"]);
        Route::get("/lista/{uuid_user}", ["App\Http\Controllers\Mercado\ListaController", "listasDoUsuario"]);
    });

    Route::middleware('jwt')->group(function () {
        // Lista
        Route::patch("/lista/{uuid_lista}", ["App\Http\Controllers\Mercado\ListaController", "atualizarStatusLista"]);
        Route::put("/lista/{uuid_lista}", ["App\Http\Controllers\Mercado\ListaController", "atualizarLista"]);
        Route::get("/lista/{uuid_lista}/detalhar", ["App\Http\Controllers\Mercado\ListaController", "obterLista"]);
        Route::delete("/lista/{uuid_lista}", ["App\Http\Controllers\Mercado\ListaController", "removerLista"]);

        // Produtos
        Route::patch("/lista/produto/{id_produto}", ["App\Http\Controllers\Mercado\ListaController", "atualizarStatusProduto"]);
        Route::post("/lista/produto/{uuid_lista}", ["App\Http\Controllers\Mercado\ListaController", "adicionarProduto"]);
        Route::delete("/lista/produto/{id_produto}", ["App\Http\Controllers\Mercado\ListaController", "removerProduto"]);
    });
});

Route::prefix("/veiculos")->group(function () {
    Route::middleware('jwt')->group(function () {
        Route::post("/", ["App\Http\Controllers\VeiculosController", "create"]);
        Route::get("/meus-veiculos", ["App\Http\Controllers\VeiculosController", "getMyCars"]);
        Route::get("/principal", ["App\Http\Controllers\VeiculosController", "myMainCar"]);
        Route::patch("/principal/{id}", ["App\Http\Controllers\VeiculosController", "changeMainCar"]);
        Route::delete("/remover/{id}", ["App\Http\Controllers\VeiculosController", "remove"]);

        Route::post("/abastecer", ["App\Http\Controllers\VeiculosController", "abastecer"]);
        Route::get("/abastecimentos", ["App\Http\Controllers\VeiculosController", "abastecimentos"]);
        Route::delete("/abastecimentos/{id}", ["App\Http\Controllers\VeiculosController", "removerAbastecimento"]);
    });
});

Route::prefix("/produto")->group(function () {
    Route::get("/pesquisar", ["App\Http\Controllers\Mercado\ProdutoController", "pesquisar"]);
    Route::middleware('jwt:admin')->group(function () {
        Route::post("/categoria", ["App\Http\Controllers\Mercado\CategoriaController", "cadastrarCategoria"]);
        Route::delete("/categoria/{id}", ["App\Http\Controllers\Mercado\CategoriaController", "deletarCategoria"]);
    });

    Route::get("/categoria", ["App\Http\Controllers\Mercado\CategoriaController", "obterListas"]);
});

// Parte relacionada a saúde
Route::prefix("/saude")->group(function () {
    Route::middleware('jwt:self')->group(function () {
        //Route::get("/estatisticas/{uuid_user}", ["App\Http\Controllers\Saude\UsuarioController", "estatisticas"]);
        Route::post("/", ["App\Http\Controllers\Saude\UsuarioController", "salvar"]);
        Route::put("/perfil", ["App\Http\Controllers\Saude\UsuarioController", "updatePerfil"]);
        Route::get("/estatisticas", ["App\Http\Controllers\Saude\UsuarioController", "estatisticas"]);
    });

    Route::middleware('jwt:admin')->group(function () {
        //Route::get("/estatisticas", ["App\Http\Controllers\Saude\UsuarioController", "estatisticas"]);
        Route::get("/exportar", ["App\Http\Controllers\Saude\UsuarioController", "exportar"]);
    });
});

// Coisas de sistema
Route::prefix("/sistema")->group(function () {
    Route::middleware('jwt:admin')->group(function () {
        Route::put("/backup", ['App\Http\Controllers\Sistema\SistemaController', "backupDb"]);
    });
});

Route::get("/buscar-cep/{cep}", ['App\Http\Controllers\LookupController', "buscarCep"]);

Route::prefix("/lookup")->group(function () {
    Route::get("/tipos_pagamento", ['App\Http\Controllers\LookupController', "tiposPagamentos"]);
    Route::get("/canais_comunicacao", ['App\Http\Controllers\LookupController', "canaisComunicacao"]);
});

Route::prefix("/link-pagamento")->group(function () {
    Route::middleware('jwt:admin')->group(function () {
        Route::post("/", ['App\Http\Controllers\Ecommerce\LinkPagamentoController', "create"]);
        Route::get("/relatorio", ['App\Http\Controllers\Ecommerce\LinkPagamentoController', "relatorio"]);
        Route::delete("/{id}", ['App\Http\Controllers\Ecommerce\LinkPagamentoController', "cancelar"]);
    });
    //Route::get("/relatorio", ['App\Http\Controllers\Ecommerce\LinkPagamentoController', "relatorio"]);
    Route::get("/procurar/{link}", ['App\Http\Controllers\Ecommerce\LinkPagamentoController', "read"]);
    Route::post("/pagar", ['App\Http\Controllers\Ecommerce\LinkPagamentoController', "pagar"]);
});

Route::get("/buscar-clientes/{nome}", ["App\Http\Controllers\Ecommerce\LinkPagamentoController", "buscarCliente"]);

Route::prefix("/pedidos")->group(function () {
    Route::post("/obter-pix", ['App\Http\Controllers\Ecommerce\PedidosController', "obterPix"]);
    Route::post("/obter-boleto", ['App\Http\Controllers\Ecommerce\PedidosController', "obterBoleto"]);
});
