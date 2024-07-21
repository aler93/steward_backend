<?php

namespace App\Services;

class HttpStatus
{
    public static int $ok = 200;

    public static int $unauthorized = 401;
    public static int $forbidden    = 403;

    public static function getMessage(int $status, string $locale = "pt-BR")
    {
        $msg = self::messagePtBr();

        return $msg[$status];
    }

    private static function statusPtBr()
    {
        return [
            // 100-199
            100 => 'Continuar',
            101 => 'Trocando protocolos',
            102 => 'Processando',
            103 => 'Dicas iniciais',
            // 200-299
            200 => 'OK',
            201 => 'Criado',
            202 => 'Aceito',
            203 => 'Informação não-autoritária',
            204 => 'Sem conteúdo',
            205 => 'Resetar conteúdo',
            206 => 'Conteúdo parcial',
            207 => 'Multi-Status',
            // 300-399
            300 => 'Multiplas escolhas',
            301 => 'Movido permanentemente',
            302 => 'Encontrado',
            303 => 'Ver outro',
            304 => 'Não modificado',
            305 => 'Usar proxy',
            306 => 'Alterar Proxy',
            307 => 'Redirecionamento temporário',
            // 400-499
            400 => 'Requisição incorreta',
            401 => 'Não autorizado',
            402 => 'Pagamento requirido',
            403 => 'Proibido',
            404 => 'Não encontrado',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            418 => "I'm a teapot",
            422 => 'Unprocessable Entity',
            423 => 'Locked',
            424 => 'Failed Dependency',
            425 => 'Unordered Collection',
            426 => 'Upgrade Required',
            449 => 'Retry With',
            450 => 'Blocked by Windows Parental Controls',
            // 500 - 599
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported',
            506 => 'Variant Also Negotiates',
            507 => 'Insufficient Storage',
            509 => 'Bandwidth Limit Exceeded',
            510 => 'Not Extended'
        ];
    }

    private static function statusEnUs()
    {
        return [
            // 100-199
            100 => 'Continue',
            101 => 'Switching Protocols',
            102 => 'Processing',
            103 => 'Early Hints',
            // 200-299
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            207 => 'Multi-Status',
            // 300-399
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => 'Switch Proxy',
            307 => 'Temporary Redirect',
            // 400-499
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            418 => "I'm a teapot",
            422 => 'Unprocessable Entity',
            423 => 'Locked',
            424 => 'Failed Dependency',
            425 => 'Unordered Collection',
            426 => 'Upgrade Required',
            449 => 'Retry With',
            450 => 'Blocked by Windows Parental Controls',
            // 500 - 599
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported',
            506 => 'Variant Also Negotiates',
            507 => 'Insufficient Storage',
            509 => 'Bandwidth Limit Exceeded',
            510 => 'Not Extended'
        ];
    }
}
