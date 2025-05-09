<?php

namespace App\Services;

use App\Models\Instituicao;
use App\Models\Convenio;
use App\Models\Taxa;

class CreditoService 
{
    public function simularCredito($data)
    {
        $res = $info = [];
        $taxas = Taxa::all();
        $valorEmprestimo = $data['valor_emprestimo'];
        $instituicoes = ($data['instituicoes']) ? $data['instituicoes'] : Instituicao::listKeys();
        $convenios = ($data['convenios']) ? $data['convenios'] : Convenio::listKeys();
        $parcelas = ($data['parcela']) ? [$data['parcela']] : [36,48,60,72,84];

        foreach($instituicoes as $instituicao)
        {
            foreach($convenios as $convenio)
            {
                foreach($parcelas as $parcela)
                {
                    foreach ($taxas as $fonte) {
                        if (
                            $fonte->instituicao === $instituicao &&
                            $fonte->convenio === $convenio &&
                            $fonte->parcelas == $parcela
                        ) {
                            $info[] = [
                                'taxa' => (float) $fonte->taxaJuros,
                                'parcelas' => $parcela,
                                'valor_parcela' => round($valorEmprestimo*$fonte->coeficiente,2),
                                'convenio' => $convenio,
                            ];
                        }
                        if (!empty($info)) $res[$instituicao] = $info;
                    }
                }
            }
        }
        return $res;
    }
}
