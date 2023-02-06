<?php

namespace Tests\Feature\Listas;

use Carbon\Carbon;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\MockData;
use Tests\Feature\TestHelper;
use Tests\TestCase;

class ListaTest extends TestCase
{
    use MockData;

    private Generator $faker;
    private string    $url = "api/mercado/lista";
    private string    $jwt = "";

    protected function setUp(): void
    {
        parent::setUp();

        $this->faker = Factory::create("pt_BR");
        $this->jwt   = TestHelper::login();
    }

    private function makeData(): array
    {
        $produtos = $this->makeProdutos(rand(1, 50));
        $lista    = [
            "data_compra" => Carbon::now()->format("Y-m-d"),
            "produtos"    => $produtos
        ];

        return $lista;
    }

    private function makeProdutos($n = 1): array
    {
        $produtos = [];

        for ($i = 1; $i < $n; $i++) {
            $produtos[] = [
                "produto"     => $this->faker->word,
                "observacoes" => $this->faker->realTextBetween(10, 500),
            ];
        }

        return $produtos;
    }

    public function testCadastrarLista()
    {
        $user  = $this->getUser();
        $lista = $this->makeData();
        dd($lista);

        $response = $this->post($this->url . "/" . $user["uuid"], $lista, TestHelper::makeAuthHeader($this->jwt));
        $response->assertStatus(200);
    }
}
