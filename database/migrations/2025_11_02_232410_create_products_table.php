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
        Schema::create('products', function (Blueprint $table) {
            $table->id();                          // ID padrão (coluna: id)
            $table->string('name');                // Nome do produto
            $table->text('description')->nullable(); // Descrição
            $table->string('image')->nullable();   // Caminho da imagem
            $table->decimal('price', 10, 2);       // Preço
            $table->timestamps();                  // created_at / updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
