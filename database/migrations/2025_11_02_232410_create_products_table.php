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
        Schema::create('products', function (Blueprint $table) {
           $table->id('product_id'); // Equivalente a: product_id int [pk]
            $table->text('description')->nullable(); // Equivalente a: description text
            $table->text('images')->nullable(); // Equivalente a: images text
            $table->decimal('price', 8, 2); // Equivalente a: price decimal (8 dígitos no total, 2 após a vírgula)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
