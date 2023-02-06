<?php

namespace Tests\Feature\Users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\TestHelper;
use Tests\TestCase;

class LoginTest extends TestCase
{
    private string $jwt = "";

    public function __destruct()
    {
        if (strlen($this->jwt) > 0) {
            TestHelper::logout($this->jwt);
        }
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $response = $this->post('/api/login', ["email" => "tester@steward.com.br", "password" => "11351892"]);

        $structure = ["access_token", "token_type", "expires_in"];
        $response->assertStatus(200)->assertJsonStructure($structure);
    }

    public function testLoginFail()
    {
        $response = $this->post('/api/login', ["email" => "tester@steward.com.br", "password" => "123456"]);

        $structure = ["message"];
        $response->assertStatus(401)->assertJsonStructure($structure);
    }

    public function testGetMe()
    {
        $this->jwt = TestHelper::login();

        $r         = $this->get("/api/get-me", ["Authorization" => $this->jwt]);
        $structure = [
            "usuario" => [
                "uuid",
                "email",
                "email_verified_at",
                "change_password",
                "created_at",
                "updated_at",
                "admin",
            ]
        ];

        $r->assertJsonStructure($structure)->assertStatus(202);
    }
}
