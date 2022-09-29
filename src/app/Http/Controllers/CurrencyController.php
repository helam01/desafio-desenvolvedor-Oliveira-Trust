<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Services\CurrencyService;
use App\Http\Requests\ClientRequest;

class CurrencyController extends Controller
{
    private $currencyService;

    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    public function getOriginList()
    {
        $list = $this->currencyService->getOriginList();
        return response()->json($list);
    }

    public function getTargetList()
    {
        $list = $this->currencyService->getTargetList();
        return response()->json($list);
    }
}
