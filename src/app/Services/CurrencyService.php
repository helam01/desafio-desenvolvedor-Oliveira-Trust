<?php

namespace App\Services;

use App\Models\Client;

class ClientService
{
    public function getList()
    {
        # Aqui faria tratamento para receber opções de filtros de pesquisa
        # E tambem faria a busca com paginação

        $list = Client::get();

        # Aqui faria formatação dos dados antes de retornar

        return $list;
    }

    public function register($inputs)
    {
        # Aqui faria uma validação dos dados, verificando se está tudo certo antes de persistir na base
        return Client::create($inputs);
    }
}
