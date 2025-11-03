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
        Schema::create('plants', function (Blueprint $table) {
            $table->id('plant_id'); // Equivalente a: plant_id int [pk]

            // CHAVE ESTRANGEIRA para a tabela 'users'
            $table->foreignId('user_id') // Equivalente a: user_id int [not null]
                  ->constrained(table: 'users', column: 'user_id') // Referencia a PK 'user_id' na tabela 'users'
                  ->onDelete('cascade'); // Se o usuário for deletado, suas plantas cadastradas são apagadas
            
            // Colunas de dados da planta
            $table->string('scientific_name')->nullable(); // Equivalente a: scientific_name varchar
            $table->string('common_name')->nullable(); // Equivalente a: common_name varchar
            $table->text('description')->nullable(); // Equivalente a: description text
            $table->text('benefits')->nullable(); // Equivalente a: benefits text
            $table->text('contraindications')->nullable(); // Equivalente a: contraindications text
            $table->text('usage_methods')->nullable(); // Equivalente a: usage_methods text
            $table->text('scientific_references')->nullable(); // Equivalente a: scientific_references text
            
            $table->timestamps(); 

            // Adiciona um índice para otimizar buscas por nome
            $table->index(['scientific_name', 'common_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};
