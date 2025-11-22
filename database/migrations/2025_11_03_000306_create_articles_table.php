<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            // Primary Key
            $table->id('article_id');

            // Foreign Key -> users.user_id
            $table->foreignId('user_id')
                  ->constrained('users', 'user_id') 
                  ->onDelete('restrict');

            // Campos do artigo
            $table->string('title');
            $table->string('author')->nullable();
            $table->date('publication_date'); 
            $table->text('description')->nullable();
            $table->text('scientific_references')->nullable();

            $table->timestamps();

            // Índices
            $table->index(['title', 'author']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
