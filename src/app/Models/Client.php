<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = [
        'code',
        'name',
        'document',
        'email',
        'birthdate',
        'address_street',
        'address_number',
        'address_complement',
        'address_zipcode',
        'address_neighborhood',
        'address_city',
    ];
}
