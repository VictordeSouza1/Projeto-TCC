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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('review_id'); // PK

            // FK para USERS (users.user_id)
            $table->foreignId('user_id')
                ->constrained(table: 'users', column: 'user_id')
                ->onDelete('cascade');

            // FK para PRODUCTS (products.id)
            $table->foreignId('product_id')
                ->constrained(table: 'products', column: 'id') // ← CORRIGIDO
                ->onDelete('cascade');

            // Colunas
            $table->integer('rating')->default(0);
            $table->text('comments')->nullable();

            $table->timestamps();

            // Índices
            $table->index('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
