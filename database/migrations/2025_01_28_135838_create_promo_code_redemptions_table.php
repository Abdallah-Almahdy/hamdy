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
        Schema::create('promo_code_redemptions', function (Blueprint $table) {
            $table->id(); // Primary key as UUID
            $table->foreignId('promo_id')->constrained(table: 'promo_codes')->onDelete('cascade');
            $table->string('user_phone_token'); // User's phone token or unique identifier
            $table->timestamp('used_at')->nullable(false); // Timestamp for when the promo code was redeemed
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo_code_redemptions');
    }
};
