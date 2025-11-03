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
        Schema::create('encyclopedias', function (Blueprint $table) {
           $table->id('encyclopedia_id'); // Equivalente a: encyclopedia_id int [pk]

            // CHAVE ESTRANGEIRA para a tabela 'plants'. 
            // É comum em 1:1 que esta FK seja ÚNICA (unique) para garantir o relacionamento.
            $table->foreignId('plant_id') // Equivalente a: plant_id int [not null]
                  ->unique() // Garante que apenas uma entrada de enciclopédia exista por planta
                  ->constrained(table: 'plants', column: 'plant_id') // Referencia a PK 'plant_id' na tabela 'plants'
                  ->onDelete('cascade'); // Se a planta for deletada, o registro da enciclopédia é apagado
            
            // Colunas de detalhes da enciclopédia
            $table->text('detailed_description')->nullable(); // Equivalente a: detailed_description text
            $table->text('illustrative_images')->nullable(); // Equivalente a: illustrative_images text (guardando URLs/JSON)
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encyclopedias');
    }
};
