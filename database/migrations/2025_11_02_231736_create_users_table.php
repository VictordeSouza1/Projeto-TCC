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
            $table->id('user_id'); // PK personalizada
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            // Campo opcional
            $table->string('cnpj')->nullable();

            // CORRIGIDO: role_id agora é OPICIONAL
            $table->foreignId('role_id')
                  ->nullable()                     // permite vazio
                  ->constrained('roles')           // FK
                  ->nullOnDelete();                // se o role for apagado, vira NULL

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
