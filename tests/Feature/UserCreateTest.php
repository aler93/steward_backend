<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserCreateTest extends TestCase
{
    use WithFaker;

    private function gerarUsuario()
    {
        $faker = \Faker\Factory::create();
        return [
            "email"    => $faker->email(),
            "password" => $faker->password(8, 40),
            "perfil"   => [
                "nome"            => $faker->name(),
                "cpf"             => $faker->numerify("###.###.###-##"),
                "cpf_responsavel" => (bool)rand(0, 3),
                "telefone"        => $faker->numerify("(##) # ####-####"),
                "altura"          => $faker->randomFloat(2, 1.4, 2.2),
                "avater_url"      => null,
            ]
        ];
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_users()
    {
        for ($i = 0; $i < 10; $i++) {
            $data     = $this->gerarUsuario();
            $response = $this->post('/api/user', $data);

            $response->assertStatus(201);
        }
    }
}
