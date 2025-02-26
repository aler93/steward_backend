<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LinkCreateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_no_user()
    {
        $faker = \Faker\Factory::create();

        $data = [
            "valor" => $faker->randomFloat(2, 1, 50000),
        ];

        $response = $this->post('/api/link-pagamento', $data, ["authorization" => "Bearer " . $this->getJWT()]);

        $response->assertStatus(201);
    }

    private function getJWT(): string
    {
        return "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwODAvYXBpL3JlZnJlc2giLCJpYXQiOjE3MjE4NDA0NzIsImV4cCI6MTcyMTg0NDExNSwibmJmIjoxNzIxODQwNTE1LCJqdGkiOiJpNmVRbWxrVnpMb2d4ZThqIiwic3ViIjoiMiIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.tZAdmLle5gV63nexELtPrf1CWoP9ClIcURyaLj87G54";
    }
}
