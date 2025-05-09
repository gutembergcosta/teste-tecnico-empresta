<?php

namespace App\Http\Controllers;

use App\Models\Convenio;

class ConvenioController extends Controller
{
    public function list()
    {
        $data = Convenio::all();
        return response()->json($data, 200);
    }
}
