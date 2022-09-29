<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{
    protected $table = 'conversions';

    protected $fillable = [
        'user_id',
        'currency_origin',
        'currency_target',
        'origin_conversion_value',
        'payment_method',
        'target_unit_value',
        'target_conversion_value',
        'payment_method_fee',
        'conversion_fee',
        'origin_discounted_value',
    ];
}
