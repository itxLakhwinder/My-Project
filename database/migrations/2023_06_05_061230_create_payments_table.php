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
        Schema::create('payments', function (Blueprint $table) {
               $table->id();
            $table->integer('users_id');
            $table->integer('delivery_id');
            $table->integer('user_cards_id');
            $table->string('transaction_id', 50)->nullable();
            $table->string('balance_transaction', 50)->nullable();
            $table->string('customer', 50)->nullable();
            $table->string('currency');
            $table->decimal('amount', 8, 2);
            $table->string('payment_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
