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
Route::get("/user", ['App\Http\Controllers\UserController', "listar"])->middleware("jwt");
Route::get("/user/{uuid}", ['App\Http\Controllers\UserController', "buscar"]);
Route::put("/user/{uuid}", ['App\Http\Controllers\UserController', "atualizar"]);
Route::patch("/user/{uuid}", ['App\Http\Controllers\UserController', "admin"]);
Route::delete("/user/{uuid}", ['App\Http\Controllers\UserController', "remover"])->middleware("jwt");

Route::post("/login", ["App\Http\Controllers\LoginController", "login"]);
Route::post("/logout", ["App\Http\Controllers\LoginController", "logout"]);
Route::post("/refresh", ["App\Http\Controllers\LoginController", "refresh"]);
Route::get("/get-me", ["App\Http\Controllers\LoginController", "getMe"]);

// Listas de mercados e etc.
Route::prefix("/mercado")->group(function() {
    Route::middleware('jwt:self')->group(function() {
        Route::post("/lista/{uuid_user}", ["App\Http\Controllers\Mercado\ListaController", "cadastrarLista"]);
        Route::get("/lista/{uuid_user}", ["App\Http\Controllers\Mercado\ListaController", "listasDoUsuario"]);
    });

    Route::middleware('jwt')->group(function() {
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

Route::prefix("/produto")->group(function(){
    Route::middleware('jwt:admin')->group(function() {
        Route::post("/categoria", ["App\Http\Controllers\Mercado\ProdutoController", "cadastrarCategoria"]);
        Route::delete("/categoria", ["App\Http\Controllers\Mercado\ProdutoController", "deletarCategoria"]);
    });

    Route::get("/categoria", ["App\Http\Controllers\Mercado\ProdutoController", "obterListas"]);
});

// Parte relacionada a saúde
Route::prefix("/saude")->group(function(){
    Route::middleware('jwt:self')->group(function() {
        //Route::get("/estatisticas/{uuid_user}", ["App\Http\Controllers\Saude\UsuarioController", "estatisticas"]);
    });

    Route::middleware('jwt')->group(function() {
        Route::get("/estatisticas/{uuid_user}", ["App\Http\Controllers\Saude\UsuarioController", "estatisticas"]);
        Route::post("/{uuid_user}", ["App\Http\Controllers\Saude\UsuarioController", "salvar"]);
    });
});

// Parte Admin
Route::prefix("/admin")->group(function(){
    Route::middleware('jwt:admin')->group(function() {
        Route::get("/backup/categoria-produtos", ["App\Http\Controllers\Admin\BackupController", "categoriaProdutos"]);
    });
    //Route::get("/backup/categoria-produtos", ["App\Http\Controllers\Admin\BackupController", "categoriaProdutos"]);
});
