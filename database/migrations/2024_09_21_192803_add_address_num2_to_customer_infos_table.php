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
        Schema::table('customer_infos', function (Blueprint $table) {
            $table->text('addressCountry2')->nullable();
            $table->text('addresscity2')->nullable();
            $table->text('addressstreet2')->nullable();
            $table->text('addressbuildingNumber2')->nullable();
            $table->text('addressfloorNumber2')->nullable();
            $table->text('addressApartmentNumber2')->nullable();
            $table->text('disSign2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_infos', function (Blueprint $table) {
            $table->text('addressCountry2')->nullable();
            $table->text('addresscity2')->nullable();
            $table->text('addressstreet2')->nullable();
            $table->text('addressbuildingNumber2')->nullable();
            $table->text('addressfloorNumber2')->nullable();
            $table->text('addressApartmentNumber2')->nullable();
            $table->text('disSign2')->nullable();
        });
    }
};
