<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id('id');

            $table->string('code')->unique();

            $table->enum('promo_cat', ['user', 'all']); // ENUM with allowed values

            $table->enum('type', ['limited', 'unlimited'])->nullable();
            $table->integer('users_limit')->nullable();

            $table->integer('available_codes')->nullable();
            $table->integer('min_order_value')->nullable();

            $table->enum('discount_type', ['percentage', 'cash']);
            $table->decimal('discount_cash_value', 8, 2)->nullable();
            $table->tinyInteger('discount_percentage_value')->nullable();



            $table->boolean('active')->nullable();
            $table->date('expiry_date')->nullable();

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
        Schema::dropIfExists('promo_codes');
    }
}
