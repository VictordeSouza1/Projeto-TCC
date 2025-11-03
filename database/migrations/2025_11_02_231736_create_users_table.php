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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id'); // Equivalente a: user_id int [pk]
            $table->string('name'); // Equivalente a: name varchar
            $table->string('email')->unique(); // Equivalente a: email varchar
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password'); // Equivalente a: password varchar
            
            // Novos campos:
            $table->string('cnpj')->nullable(); // Equivalente a: cnpj varchar [null]
            
            // Chave estrangeira (FK) para a tabela 'roles'
            $table->foreignId('role_id') // Equivalente a: role_id int [not null]
                  ->constrained('roles') // Foreign key para a tabela 'roles'
                  ->onDelete('restrict'); // Evita deletar um Role se houver Users ligados

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
