<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreditoRequest;
use App\Services\CreditoService;

class CreditoController extends Controller
{
    public function simular(CreditoRequest $request, CreditoService $service)
    {
        $res = $service->simularCredito($request->validated());
        return response()->json($res, 200);
    }
}
