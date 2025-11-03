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
       Schema::create('permissions', function (Blueprint $table) {
            // Chaves primárias compostas e chaves estrangeiras
            $table->foreignId('role_id') // Cria role_id (UNSIGNED BIGINT)
                  ->constrained('roles') // Foreign key para a tabela 'roles'
                  ->onDelete('cascade'); // Ação ao deletar (opcional, mas recomendado)

            $table->foreignId('resource_id') // Cria resource_id (UNSIGNED BIGINT)
                  ->constrained('resources') // Foreign key para a tabela 'resources'
                  ->onDelete('cascade'); // Ação ao deletar (opcional, mas recomendado)

            // Colunas
            $table->boolean('permission')->default(false); // Equivalente a: permission boolean

            // Define a chave primária composta
            $table->primary(['role_id', 'resource_id']); 

            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
