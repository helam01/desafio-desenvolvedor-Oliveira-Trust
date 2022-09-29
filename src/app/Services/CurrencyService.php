<?php

namespace App\Services;

use App\Models\Currency;

class CurrencyService
{
    public function getOriginList()
    {
        $list = Currency::select('id','code','label','money_sign')
            ->where('is_origin','yes')
            ->get();

        return $list;
    }

    public function getTargetList()
    {
        $list = Currency::select('id','code','label','money_sign')
            ->where('is_target','yes')
            ->get();

        return $list;
    }
}
