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
        Schema::create('deliveries', function (Blueprint $table) {
             $table->id();
            $table->foreignId('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('stores_id')->references('id')->on('stores')->onDelete('cascade');
            $table->string('e_reciept')->nullable();
            $table->string('store_name')->nullable();
            $table->string('store_address')->nullable();
            $table->string('pickup_date')->nullable();
            $table->string('pickup_time')->nullable();
            $table->string('delivery_date');
            $table->string('delivery_time');
            $table->string('delivery_address');
            $table->string('phone_number');
            $table->string('customer_name');
            $table->string('pickup_need')->nullable();
            $table->text('additinal_note')->nullable();
            $table->string('status', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
