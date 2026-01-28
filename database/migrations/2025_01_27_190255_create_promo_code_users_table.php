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
        Schema::create('promo_code_users', function (Blueprint $table) {
            $table->id(); // Primary key as UUID
            $table->string('user_phone_token')->nullable(); // User's phone token or unique identifier
            $table->boolean('used')->default(false); // Whether the user has redeemed the promo code
            $table->timestamp('used_at')->nullable(); // Timestamp for when the promo code was redeemed
            $table->foreignId('order_id')->constrained(table: 'orders')->onDelete('cascade');
            $table->foreignId('user_id')->constrained(table: 'users')->onDelete('cascade');
            $table->foreignId('promo_id')->constrained(table: 'promo_codes')->onDelete('cascade');
            $table->timestamps(); // Created and updated timestamps
            // Foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo_code_users');
    }
};
