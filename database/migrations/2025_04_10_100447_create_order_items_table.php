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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->foreignId('item_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->integer('quantity');
            $table->string('name');
            $table->integer('price');
            $table->integer('cost');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
