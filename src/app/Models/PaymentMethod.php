<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'payments_methods';

    protected $fillable = [
        'name',
        'fee',
        'active'
    ];
}
