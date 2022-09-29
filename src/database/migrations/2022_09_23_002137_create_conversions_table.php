<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->nullable();
            $table->string('currency_origin');
            $table->string('currency_target');
            $table->float('origin_conversion_value');
            $table->string('payment_method');
            $table->float('target_unit_value');
            $table->float('target_conversion_value');
            $table->float('payment_method_fee');
            $table->float('conversion_fee');
            $table->float('origin_discounted_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversions');
    }
};
