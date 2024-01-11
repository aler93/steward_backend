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

if( !function_exists('slugger') ) {
    function slugger(string $str): string {
        $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $str = preg_replace( '/[^a-z0-9 ]/i', '', $str);

        return str_replace(" ", "-", strtolower($str));
    }
}

if( !function_exists('noSpace') ) {
    function noSpace(string $str, bool $lower = true): string {
        $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $str = preg_replace( '/[^a-z0-9 ]/i', '', $str);
        if( $lower ) {
            return str_replace(" ", "", strtolower($str));
        }
        return str_replace(" ", "", $str);
    }
}

if( !function_exists('like') ) {
    function like(string $str): string {
        return "%" . $str . "%";
    }
}

if( !function_exists('numFormatBr') ) {
    function numFormatBr(?string $number): string {
        return number_format($number, 2, ",", ".");
    }
}
