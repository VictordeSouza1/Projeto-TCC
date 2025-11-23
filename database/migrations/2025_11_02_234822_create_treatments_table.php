<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();

            // FK para plantas (id)
            $table->unsignedBigInteger('plant_id');
            $table->foreign('plant_id')
                  ->references('id')       // PK real da tabela plantas
                  ->on('plantas')          // nome correto da tabela
                  ->cascadeOnDelete();

            // FK para users (user_id)
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                  ->references('user_id')  // PK personalizada
                  ->on('users')
                  ->nullOnDelete();

            // Campos de tratamento
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->text('modo_preparo')->nullable();
            $table->text('observacoes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('treatments');
    }
};
