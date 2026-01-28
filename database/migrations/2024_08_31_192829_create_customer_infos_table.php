<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_infos', function (Blueprint $table) {
            $table->id();
            $table->text('email');
            $table->text('firstName');
            $table->text('lastName');
            $table->text('profileImage')->nullable();
            $table->text('phonenum')->nullable();
            $table->text('addressCountry')->nullable();
            $table->text('addresscity')->nullable();
            $table->text('addressstreet')->nullable();
            $table->text('addressbuildingNumber')->nullable();
            $table->text('addressfloorNumber')->nullable();
            $table->text('addressApartmentNumber')->nullable();
            $table->text('disSign')->nullable();







            $table->text('gender')->nullable();
            $table->text('birthDate')->nullable();
            $table->text('postalCode')->nullable();
            $table->timestamps();
        });
    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_infos');
    }
};
