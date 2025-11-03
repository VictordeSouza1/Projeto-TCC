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
        Schema::create('treatments', function (Blueprint $table) {
            $table->id('treatment_id'); // Equivalente a: treatment_id int [pk]

            // CHAVE ESTRANGEIRA para a tabela 'plants'
            $table->foreignId('plant_id') // Equivalente a: plant_id int [not null]
                  ->constrained(table: 'plants', column: 'plant_id') // Referencia a PK 'plant_id' na tabela 'plants'
                  ->onDelete('cascade'); // Se a planta for deletada, seus tratamentos registrados são apagados

            // CHAVE ESTRANGEIRA para a tabela 'users'
            $table->foreignId('user_id') // Equivalente a: user_id int [not null]
                  ->constrained(table: 'users', column: 'user_id') // Referencia a PK 'user_id' na tabela 'users'
                  ->onDelete('cascade'); // Se o usuário for deletado, seus tratamentos registrados são apagados
            
            // Colunas de detalhes do tratamento
            $table->text('treatment_description')->nullable(); // Equivalente a: treatment_description text
            $table->text('scientific_references')->nullable(); // Equivalente a: scientific_references text
            
            $table->timestamps(); 

            // Adiciona índices para otimizar buscas por planta e usuário
            $table->index(['plant_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatments');
    }
};
