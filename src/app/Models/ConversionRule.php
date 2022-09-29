<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConversionRule extends Model
{
    protected $table = 'conversion_rules';

    protected $fillable = [
        'conversion_min_value',
        'conversion_max_value',
        'conversion_fee'
    ];
}
