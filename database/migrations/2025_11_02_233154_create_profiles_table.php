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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id('profile_id'); // PK: profile_id int [pk]
            
            // FK: user_id int [not null] -> users.user_id
            $table->foreignId('user_id')->constrained('users', 'user_id')->unique()->onDelete('cascade');
            
            $table->text('allergies')->nullable();
            $table->text('medical_conditions')->nullable();
            $table->text('personal_preferences')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
