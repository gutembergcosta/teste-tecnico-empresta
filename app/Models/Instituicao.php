<?php

namespace App\Models;

class Instituicao
{
    public string $chave;
    public string $valor;

    public function __construct(array $data)
    {
        $this->chave = $data['chave'];
        $this->valor = $data['valor'];
    }

    public static function all(): array
    {
        $json = file_get_contents(storage_path('dados/instituicoes.json'));
        return json_decode($json, true);
    }

    public static function listKeys(): array
    {
        return array_column(self::all(),'chave');
    }
    
}


?>