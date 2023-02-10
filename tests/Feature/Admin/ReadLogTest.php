<?php

namespace Tests\Feature\Admin;

use Tests\Feature\MockData;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Feature\TestHelper;


class ReadLogTest extends TestCase
{
    use MockData;
    private Generator $faker;

    private string $url = "/api/admin";
    private string $jwt = "";

    protected function setUp(): void
    {
        parent::setUp();

        $this->faker = Factory::create("pt_BR");
        //$this->jwt   = TestHelper::login("admin");
    }

    public function __destruct()
    {
        if (strlen($this->jwt) > 0) {
            TestHelper::logout($this->jwt);
        }
    }

    public function testReadDir()
    {
        $response = $this->get($this->url . '/directory?dir=bkp/json/2023-02-04_14-50-09');

        $response->assertStatus(200)->dump();
    }

    public function testReadFile()
    {
        $response = $this->get($this->url . '/open-file?dir=bkp/json/2023-02-04_14-50-09/categorias_produtos.json');

        $response->assertStatus(200)->dump();
    }
}
