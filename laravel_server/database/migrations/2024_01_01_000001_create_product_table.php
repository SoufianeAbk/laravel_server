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
        Schema::create('jerseys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('team');
            $table->string('league');
            $table->string('season');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('image_url');
            $table->string('player_name')->nullable();
            $table->integer('player_number')->nullable();
            $table->enum('type', ['home', 'away', 'third', 'goalkeeper']);
            $table->json('sizes')->default('["S", "M", "L", "XL", "XXL"]');
            $table->integer('stock_quantity')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jerseys');
    }
};