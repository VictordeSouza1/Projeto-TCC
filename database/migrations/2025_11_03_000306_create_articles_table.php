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
        Schema::create('articles', function (Blueprint $table) {
            $table->id('article_id'); // Equivalente a: article_id int [pk]

            // CHAVE ESTRANGEIRA para a tabela 'users'
            $table->foreignId('user_id') // Equivalente a: user_id int [not null]
                  ->constrained(table: 'users', column: 'user_id') // Referencia a PK 'user_id' na tabela 'users'
                  ->onDelete('restrict'); // Evita que um usuário seja apagado se ainda tiver artigos

            // Colunas do artigo
            $table->string('title'); // Equivalente a: title varchar
            $table->string('author')->nullable(); // Equivalente a: author varchar
            $table->timestamp('publication_date')->useCurrent(); // Equivalente a: publication_date timestamp
            $table->text('description')->nullable(); // Equivalente a: description text
            $table->text('scientific_references')->nullable(); // Equivalente a: scientific_references text
            
            $table->timestamps(); 

            // Adiciona um índice para buscas por título ou autor
            $table->index(['title', 'author']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
