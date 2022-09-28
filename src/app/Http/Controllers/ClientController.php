<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Services\ClientService;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    private $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function getList()
    {
        $list = $this->clientService->getList();
        return response()->json($list);

    }

    public function register(ClientRequest $request)
    {
        $inputs = $request->all();

        try {
            $this->clientService->register($inputs);
            return response()
                ->json(['success'=>true])
                ->withHeaders([
                    'Access-Control-Allow-Origin' => '*'
                ]);
        } catch(\Exception $e) {

            # Aqui registratria os detalhes da exception em um log
            #return response('Error on save client', 500);
            return response($e->getMessage(), 500);
        }
    }
}
