<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Services\ProductService;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getList()
    {
        $list = $this->productService->getList();
        return response()->json($list);

    }

    public function register(ProductRequest $request)
    {
        $inputs = $request->all();

        try {
            $this->productService->register($inputs);
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
