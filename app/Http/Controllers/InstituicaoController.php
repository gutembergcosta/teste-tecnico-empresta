<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;

class InstituicaoController extends Controller
{
    public function list()
    {
        $data = Instituicao::all();
        return response()->json($data, 200);
    }
}
