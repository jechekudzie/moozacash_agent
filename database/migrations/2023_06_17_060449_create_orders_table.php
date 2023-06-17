<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('status')->nullable();
            $table->string('amount')->nullable();
            $table->string('fromCurrency')->nullable();
            $table->string('toCurrency')->nullable();
            $table->string('rate')->nullable();
            $table->string('description')->nullable();
            $table->string('sender')->nullable();
            $table->string('recipient')->nullable();
            $table->string('agent')->nullable();
            $table->string('source')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
