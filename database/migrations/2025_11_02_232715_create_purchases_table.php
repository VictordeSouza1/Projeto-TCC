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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id('purchase_id'); // Equivalente a: purchase_id int [pk]

            // Chave estrangeira para a tabela 'users'
            $table->foreignId('user_id') // Equivalente a: user_id int [not null]
                  ->constrained('users', 'user_id') // Referencia a tabela 'users' na coluna 'user_id' (a FK de users)
                  ->onDelete('cascade'); // Se o user for deletado, as compras dele são apagadas

            // Chave estrangeira para a tabela 'products'
            $table->foreignId('product_id') // Equivalente a: product_id int [not null]
                  ->constrained('products', 'product_id') // Referencia a tabela 'products' na coluna 'product_id'
                  ->onDelete('restrict'); // Evita deletar um produto se houver compras ligadas a ele
            
            // Colunas
            $table->timestamp('purchase_date')->useCurrent(); // Equivalente a: purchase_date timestamp
            
            $table->timestamps(); 

            // Adiciona um índice composto para garantir que o mesmo usuário possa comprar o mesmo produto várias vezes, mas é bom para buscas.
            $table->index(['user_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
