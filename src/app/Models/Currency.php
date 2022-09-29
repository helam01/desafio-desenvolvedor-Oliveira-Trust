<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currencies';

    protected $fillable = [
        'code',
        'label',
        'money_sign',
        'is_origin',
        'is_target',
    ];
}
