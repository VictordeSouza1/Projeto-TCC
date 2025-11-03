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
            $table->id('review_id'); // Equivalente a: review_id int [pk]

            // CHAVE ESTRANGEIRA para a tabela 'users'
            $table->foreignId('user_id') // Equivalente a: user_id int [not null]
                  ->constrained(table: 'users', column: 'user_id') // Referencia a PK 'user_id' na tabela 'users'
                  ->onDelete('cascade'); // Se o usuário for deletado, suas avaliações são apagadas

            // CHAVE ESTRANGEIRA para a tabela 'products'
            $table->foreignId('product_id') // Equivalente a: product_id int [not null]
                  ->constrained(table: 'products', column: 'product_id') // Referencia a PK 'product_id' na tabela 'products'
                  ->onDelete('cascade'); // Se o produto for deletado, suas avaliações são apagadas
            
            // Colunas
            $table->integer('rating')->default(0); // Equivalente a: rating int (0 a 5, por exemplo)
            $table->text('comments')->nullable(); // Equivalente a: comments text
            
            $table->timestamps(); 

            // Adiciona um índice para otimizar buscas por produto ou usuário
            $table->index(['product_id']);;
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
