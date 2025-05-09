<?php

namespace App\Models;

class Convenio
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
        $json = file_get_contents(storage_path('dados/convenios.json'));
        $dados = json_decode($json, true);

        return array_map(fn($item) => new self($item), $dados);
    }

    public static function listKeys(): array
    {
        return array_column(self::all(),'chave');
    }

}


?>