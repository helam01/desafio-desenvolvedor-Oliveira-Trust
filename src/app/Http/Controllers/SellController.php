<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Services\SellService;
use App\Http\Requests\SellRequest;

class SellController extends Controller
{
    private $sellService;

    public function __construct(SellService $sellService)
    {
        $this->sellService = $sellService;
    }

    public function getList()
    {
        $list = $this->sellService->getList();
        return response()->json($list);

    }

    public function register(SellRequest $request)
    {
        $inputs = $request->all();

        try {
            $this->sellService->register($inputs);
            return response()
                ->json(['success'=>true])
                ->withHeaders([
                    'Access-Control-Allow-Origin' => '*'
                ]);
        } catch(\Exception $e) {

            # Aqui registratria os detalhes da exception em um log
            return response($e->getMessage(), 500);
        }
    }
}
