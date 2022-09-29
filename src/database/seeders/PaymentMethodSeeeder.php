<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;

class PaymentMethodSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payments_methods = [
            [
                'id' => 1,
                'name' => 'Boleto',
                'fee' => 1.45,
                'active' => 'yes'
            ],
            [
                'id' => 2,
                'name' => 'Cartão de crédito',
                'fee' => 7.63,
                'active' => 'yes'
            ]
        ];

        foreach( $payments_methods as $payment_method ) {
            PaymentMethod::create($payment_method);
        }
    }
}
