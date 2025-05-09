<?php

namespace App\Models;

class Taxa
{

    public string $parcelas;
    public string $taxaJuros;
    public string $coeficiente;
    public string $instituicao;
    public string $convenio;

    public function __construct(array $data)
    {
        $this->parcelas = $data['parcelas'];
        $this->taxaJuros = $data['taxaJuros'];
        $this->coeficiente = $data['coeficiente'];
        $this->instituicao = $data['instituicao'];
        $this->convenio = $data['convenio'];
    }

    public static function all(): array
    {
        $json = file_get_contents(storage_path('dados/taxas.json'));
        $dados = json_decode($json, true);

        return array_map(fn($item) => new self($item), $dados);
    }
    
}


?>