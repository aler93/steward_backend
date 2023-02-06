<?php

namespace Tests\Feature\Users;

//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\Feature\TestHelper;
use Tests\TestCase;

use Faker\Factory;
use Faker\Generator;
use Tests\Feature\MockData;


class UserTest extends TestCase
{
    use MockData;

    private string    $url = "/api/user";
    private Generator $faker;

    private array  $sexo   = ["M", "F", "O", "N"];
    private array  $genero = ["Masculino", "Feminino", "Outro", "Prefiro não identificar", "Transexual"];
    private string $jwt    = "";

    protected function setUp(): void
    {
        parent::setUp();

        $this->faker = Factory::create("pt_BR");
        $this->jwt   = TestHelper::login();
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

    public function getUser(string $email = "tester@steward.com.br"): array
    {
        $user = User::where("email", "=", $email)->with("perfil")->first();
        if (is_null($user)) {
            return [];
        }

        return $user->toArray();
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

        if ($response->status() != 201) {
            $response->dump();
        }

        $response->assertStatus(201)->assertJsonStructure(["uuid_user"]);
    }

    public function testUpdate()
    {
        $this->jwt  = TestHelper::login();
        $user       = $this->getUser();
        $nomeSocial = $this->faker->firstName;

        $user["perfil"]["nome_social"] = $nomeSocial;

        $r = $this->put($this->url . "/" . $user['uuid'], $user, TestHelper::makeAuthHeader($this->jwt));
        $r->assertStatus(200)->assertExactJson(["user" => $user]);
    }

    public function testUpdateAdminWithPermission()
    {
        $this->jwt = TestHelper::login("admin");
        $user      = $this->getUser();

        $r = $this->patch($this->url . "/" . $user['uuid'] . "/admin", [], TestHelper::makeAuthHeader($this->jwt));
        $r->assertStatus(204)->dump();
    }

    public function testUpdateAdminNoPermission()
    {
        $this->jwt = TestHelper::login();
        $user      = $this->getUser();

        $r = $this->patch($this->url . "/" . $user['uuid'] . "/admin", [], TestHelper::makeAuthHeader($this->jwt));
        $r->assertStatus(401);
    }

    public function testListUsers()
    {
        $this->jwt = TestHelper::login("admin");

        $r         = $this->get($this->url . "/", TestHelper::makeAuthHeader($this->jwt));
        $structure = [
            "usuarios" => [
                "*" =>
                    [
                        "uuid",
                        "email",
                        "email_verified_at",
                        "change_password",
                        "created_at",
                        "updated_at",
                        "deleted_at",
                        "admin",
                    ]
            ]
        ];

        $r->assertStatus(200)->assertJsonStructure($structure);
    }
}
