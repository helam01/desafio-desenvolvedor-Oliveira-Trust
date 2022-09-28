<?php

namespace App\Services;

use App\Models\Sell;

class SellService
{
    public function getList()
    {
        # Aqui faria tratamento para receber opções de filtros de pesquisa
        # E tambem faria a busca com paginação

        $list = Sell::with(['client','products'])->get();

        # Aqui faria formatação dos dados antes, para retornar somente os dados necessários

        return $list;
    }

    public function register($inputs)
    {
        # Aqui faria uma validação dos dados, verificando se está tudo certo antes de persistir na base
        $sell = Sell::create($inputs);

        if ( !empty($inputs['products']) ) {
            $sell->products()->sync($inputs['products']);
        }

        return $sell;
    }
}
