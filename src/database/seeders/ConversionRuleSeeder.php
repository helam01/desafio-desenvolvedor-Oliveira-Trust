<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ConversionRule;

class ConversionRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConversionRule::create([
            'conversion_min_value' => 1000,
            'conversion_max_value' => 100000,
            'conversion_fee' => '{"below":{"value":3000,"fee":2},"above":{"value":3000,"fee":1}}',
        ]);
    }
}
