<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();

            // Chave estrangeira correta:
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                ->references('id')        // agora é products.id
                ->on('products')
                ->onDelete('restrict');   // ou cascade se quiser

            $table->integer('quantity');
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
