<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserSenhaRecuperacao;
use App\Services\Telegram;
use Exception;

class UserRepository
{
    public static int $tokenSize = 6;

    private static array $chars = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];

    public function gerarToken(): string
    {
        $token = "";

        $charTaken = [];
        for( $i = 0; $i < self::$tokenSize; $i++ ) {
            $pos = rand(0, count(self::$chars)-1);

            while( in_array(self::$chars[$pos], $charTaken) ) {
                $pos = rand(0, count(self::$chars)-1);
            }
            $charTaken[] = self::$chars[$pos];

            $token .= self::$chars[$pos];
        }

        return $token;
    }

    public function enviarTokenRecuperacao(UserSenhaRecuperacao $table)
    {
        $user = User::where("email", "=", $table->email)
                    ->join("perfil_user", "users.id", "=", "perfil_user.id_user")
                    ->first();

        if( $table->canal == "telegram" ) {
            if( is_null($user->telegram_chatid) ) {
                throw new Exception("Usuário não cadastrou seu Chat ID do telegram (é preciso enviar uma mensagem para o bot steward_api_bot com a mensagem 'save /meuemail@mail.com')", 422);
            }

            if( $this->enviarTelegram($user->telegram_chatid, $table->token, $table->valido_ate->format("d/m/Y H:i")) ) {
                $table->enviado = now();
                $table->save();

                return true;
            }
        }
    }

    private function enviarTelegram(string $chatId, string $token, string $validade): bool
    {
        $mensagem = "Esse é o seu token para cadastrar uma nova senha: \n\n" . $token . "\n\n Esse token é válido até " . $validade;

        $telegram = new Telegram();
        $status = $telegram->enviar($chatId, $mensagem);

        if( $status == 200 ) {
            return true;
        }

        $result = json_decode($telegram->respBody);

        throw new Exception("Erro ao enviar mensagem: " . $result->description, $status);
    }
}