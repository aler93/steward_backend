<?php

namespace Tests\Feature;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class TestHelper
{
    private static array $allowed = ["tester", "admin"];

    /**
     * @param $perfil
     * @return string
     * @throws GuzzleException
     */
    public static function login(string $perfil = "tester"): string
    {
        try {
            if (!in_array($perfil, self::$allowed)) {
                return "";
            }

            $options = ["json" => self::getCred($perfil)];

            $client = new Client();
            $r      = $client->post(env("APP_URL") . ":" . env("APP_PORT") . "/api/login", $options);
            $resp   = json_decode($r->getBody()->getContents());

            return "Bearer " . $resp->access_token;
        } catch (\Exception $e) {
            dd($e->getCode(), $e->getMessage());
        }
    }

    public static function makeAuthHeader(string $jwt): array
    {
        return ["Authorization" => $jwt];
    }

    public static function logout(string $jwt): void
    {
        try {
            $options = ["headers" => ["Authorization" => $jwt]];

            $client = new Client();
            $r = $client->post(env("APP_URL") . ":" . env("APP_PORT") . "/api/logout", $options);

            echo $r->getBody()->getContents() . "\n\n";
        } catch (\Exception $e) {
            dd($e->getCode(), $e->getMessage());
        }
    }

    private static function getCred(string $perfil)
    {
        if ($perfil == "tester") {
            return [
                "email"    => "tester@steward.com.br",
                "password" => env("TESTER_PASS"),
            ];
        }

        if ($perfil == "admin") {
            return [
                "email"    => "admin@steward.com.br",
                "password" => env("ADMIN_PASS"),
            ];
        }

        return [];
    }
}