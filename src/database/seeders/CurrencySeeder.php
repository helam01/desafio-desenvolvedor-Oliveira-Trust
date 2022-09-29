<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            [
                'id' => 1,
                'code' => 'BRL',
                'label' => 'Real brasileiro',
                'money_sign' => 'R$',
                'is_origin' => 'yes',
                'is_target' => 'no'
            ],
            [
                'id' => 2,
                'code' => 'USD',
                'label' => 'Dolar americano',
                'money_sign' => 'US$',
                'is_origin' => 'no',
                'is_target' => 'yes'
            ],
            [
                'id' => 3,
                'code' => 'EUR',
                'label' => 'Euro',
                'money_sign' => '€',
                'is_origin' => 'no',
                'is_target' => 'yes'
            ],
        ];

        foreach( $currencies as $currency ) {
            Currency::create($currency);
        }
    }
}
