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
Route::get("/user/{uuid}", ['App\Http\Controllers\UserController', "buscar"])->middleware("jwt:self");
Route::put("/user/{uuid}", ['App\Http\Controllers\UserController', "atualizar"])->middleware("jwt:self");
Route::patch("/user/{uuid}/admin", ['App\Http\Controllers\UserController', "admin"])->middleware("jwt:admin");
Route::delete("/user/{uuid}", ['App\Http\Controllers\UserController', "remover"])->middleware("jwt:admin");

Route::post("/login", ["App\Http\Controllers\LoginController", "login"]);
Route::post("/logout", ["App\Http\Controllers\LoginController", "logout"]);
Route::post("/refresh", ["App\Http\Controllers\LoginController", "refresh"])->middleware('jwt');
Route::get("/get-me", ["App\Http\Controllers\LoginController", "getMe"]);

// Listas de mercados e etc.
Route::prefix("/mercado")->group(function () {
    Route::middleware('jwt:self')->group(function () {
        Route::post("/lista", ["App\Http\Controllers\Mercado\ListaController", "cadastrarLista"]);
        Route::get("/lista", ["App\Http\Controllers\Mercado\ListaController", "listasDoUsuario"]);
        Route::get("/lista/{uuid_lista}", ["App\Http\Controllers\Mercado\ListaController", "obterLista"]);
        Route::delete("/lista/{uuid_lista}", ["App\Http\Controllers\Mercado\ListaController", "removerLista"]);
        Route::patch("/lista/{uuid_lista}/status", ["App\Http\Controllers\Mercado\ListaController", "atualizarStatusLista"]);
        // Produtos da lista
        Route::patch("/lista/produto/{id_produto}/status", ["App\Http\Controllers\Mercado\ListaController", "atualizarStatusProduto"]);
        Route::post("/lista/produto/{uuid_lista}", ["App\Http\Controllers\Mercado\ListaController", "adicionarProduto"]);
        Route::delete("/lista/produto/{id_produto}", ["App\Http\Controllers\Mercado\ListaController", "removerProduto"]);
    });
});

// Produtos API
Route::prefix("/produto")->group(function () {
    // Categorias
    Route::get("/categoria", ["App\Http\Controllers\Mercado\CategoriaController", "obterCategorias"]);

    Route::middleware('jwt:admin')->group(function () {
        Route::post("/categoria", ["App\Http\Controllers\Mercado\CategoriaController", "cadastrarCategoria"]);
        Route::delete("/categoria/{id}", ["App\Http\Controllers\Mercado\CategoriaController", "deletarCategoria"]);
    });

    // Produtos
    Route::get("/", ["App\Http\Controllers\Mercado\ProdutoController", "obterProdutos"]);
    Route::get("/por-categoria", ["App\Http\Controllers\Mercado\ProdutoController", "obterProdutosPorCategoria"]);
    Route::get("/{uuid_produto}", ["App\Http\Controllers\Mercado\ProdutoController", "obterProdutoDetalhes"]);

    Route::middleware('jwt:admin')->group(function () {
        Route::post("/", ["App\Http\Controllers\Mercado\ProdutoController", "cadastrarProduto"]);
        Route::put("/{uuid_produto}", ["App\Http\Controllers\Mercado\ProdutoController", "atualizarProdutos"]);
        Route::delete("/{uuid_produto}", ["App\Http\Controllers\Mercado\ProdutoController", "deletarProdutos"]);
    });
});

// Parte relacionada a saúde
Route::prefix("/saude")->group(function () {
    Route::middleware('jwt:self')->group(function () {
        Route::get("/estatisticas", ["App\Http\Controllers\Saude\UsuarioController", "estatisticas"]);
        Route::post("/", ["App\Http\Controllers\Saude\UsuarioController", "salvar"]);
    });
});

// Parte Admin
Route::prefix("/admin")->group(function () {
    Route::middleware('jwt:admin')->group(function () {
        Route::get("/backup/categoria-produtos", ["App\Http\Controllers\Admin\BackupController", "categoriaProdutos"]);
        //Route::get("/logs", ["App\Http\Controllers\Admin\BackupController", "readDir"]);
    });

    Route::get("/directory", ["App\Http\Controllers\Admin\BackupController", "readDir"]);
    Route::get("/open-file", ["App\Http\Controllers\Admin\BackupController", "readFile"]);
});

// Carro & combustível
Route::prefix("/abastecimento")->group(function () {
    Route::middleware('jwt:self')->group(function () {
        Route::get("/carros", ["App\Http\Controllers\Abastecimento\CarrosController", "listar"]);
        Route::get("/carros/{uuid_carro}", ["App\Http\Controllers\Abastecimento\CarrosController", "detalhar"]);
        Route::post("/carros", ["App\Http\Controllers\Abastecimento\CarrosController", "cadastrar"]);
        Route::put("/carros/{uuid_carro}", ["App\Http\Controllers\Abastecimento\CarrosController", "atualizar"]);
        Route::delete("/carros/{uuid_carro}", ["App\Http\Controllers\Abastecimento\CarrosController", "deletar"]);

        Route::post("/", ["App\Http\Controllers\Abastecimento\ReabastecimentoController", "cadastrar"]);
        Route::get("/{uuid_carro}", ["App\Http\Controllers\Abastecimento\ReabastecimentoController", "listar"]);
        Route::delete("/deletar", ["App\Http\Controllers\Abastecimento\ReabastecimentoController", "requisitarDelete"]);
    });
});

// Inventário pessoal
Route::prefix("/inventario")->group(function () {
    Route::middleware('jwt:self')->group(function () {
        Route::post("/", ["App\Http\Controllers\Mercado\InventarioController", "cadastrar"]);
        Route::put("/", ["App\Http\Controllers\Mercado\InventarioController", "atualizar"]);
        Route::get("/", ["App\Http\Controllers\Mercado\InventarioController", "listar"]);
    });
});