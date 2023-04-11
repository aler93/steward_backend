<?php

use Ramsey\Uuid\Uuid;

if( !function_exists('uuid') ) {
    function uuid(): string {
        return Uuid::uuid4()->toString();
    }
}

if( !function_exists('filtrarNumeros') ) {
    function filtrarNumeros(string $str): string {
        return preg_replace('/[^0-9]/', '', $str);
    }
}

if( !function_exists('like') ) {
    function like(string $str): string {
        return "%" . $str . "%";
    }
}

if( !function_exists('numFormatBr') ) {
    function numFormatBr(string $number): string {
        return number_format($number, 2, ",", ".");
    }
}
