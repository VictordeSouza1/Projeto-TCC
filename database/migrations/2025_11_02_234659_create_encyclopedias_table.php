<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('encyclopedias', function (Blueprint $table) {
            
            $table->id('encyclopedia_id');

            // FK correta para a tabela 'plantas'
            $table->unsignedBigInteger('plant_id')->unique();
            $table->foreign('plant_id')
                  ->references('id')        // PK correta da tabela plantas
                  ->on('plantas')           // nome correto da tabela
                  ->onDelete('cascade');

            // Conteúdos da enciclopédia
            $table->text('detailed_description')->nullable();
            $table->text('illustrative_images')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('encyclopedias');
    }
};
