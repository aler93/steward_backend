<?php

namespace App\Services\SistemaCep;

class CepObject
{
    public string $cep;
    public string $rua;
    public string $bairro;
    public string $cidade;
    public string $estado;
    public string $pais;

    public function __construct(string $cep = "", string $rua = "", string $bairro = "", string $cidade = "", string $estado = "", string $pais = "")
    {
        $this->cep    = $this->formatCep($cep);
        $this->rua    = $rua;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->pais   = $pais;
    }

    private function formatCep(string $cep): string
    {
        try {
            if (strlen($cep) != 8) {
                throw new \Exception("CEP incorreto: Informe apenas os números");
            }

            $pri = substr($cep, 0, 2);
            $seg = substr($cep, 2, 3);
            $ter = substr($cep, 5, 3);

            return "$pri.$seg-$ter";
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
