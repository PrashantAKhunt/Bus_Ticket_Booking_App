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
            $table->foreignId('passenger_id')->constrained('passengers')->nullable();
            $table->foreignId('trip_id')->constrained('trips')->nullable();
            $table->integer('amount')->nullable();
            $table->string('payment_method')->nullable();
            $table->enum('status',['paid','pending','failed'])->default('pending');
            $table->string('transaction_id')->nullable();
            $table->string('transaction_reference')->nullable();
            $table->string('transaction_message')->nullable();
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
