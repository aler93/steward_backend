<?php

namespace Tests\Feature\Users;

//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Faker\Factory;
use Faker\Generator;
use Tests\Feature\MockData;


class UserTest extends TestCase
{
    use MockData;

    private string $url = "/api/user";
    private Generator $faker;

    private $sexo   = ["M", "F", "O", "N"];
    private $genero = ["Masculino", "Feminino", "Outro", "Prefiro não identificar", "Transexual"];

    protected function setUp(): void
    {
        parent::setUp();

        $this->faker = Factory::create("pt_BR");
    }

    private function makeData(): array
    {
        $name = $this->faker->name;

        $perfil = [
            "nome"            => $name,
            "nome_social"     => $name,
            "cpf"             => self::cpf(rand(0, 1)),
            "cpf_responsavel" => (rand(0, 20) % 5) == 0 ? 1 : 0,
            "telefone"        => $this->faker->phoneNumber(),
            "altura"          => $this->faker->randomFloat(2, 1.4, 2.2),
            "sexo"            => $this->sexo[rand(0, 3)],
            "genero"          => $this->genero[rand(0, 4)],
        ];
        $user   = [
            //"nome"     => $name,
            "email"    => $this->faker->email,
            "password" => $this->faker->password,
            "perfil"   => $perfil
        ];

        return $user;
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $user = $this->makeData();

        $response = $this->post($this->url, $user);

        if( $response->status() != 201 ) {
            $response->dump();
        }

        $response->assertStatus(201)->assertJsonStructure(["uuid_user"]);
    }
}
