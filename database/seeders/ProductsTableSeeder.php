<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Chá de Camomila',
                'description' => 'Chá natural de camomila, ótimo para ansiedade, cólicas e auxílio no sono.',
                'image' => 'pant.jpg', 
                'price' => 14.90,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Óleo de Copaíba',
                'description' => 'Óleo natural extraído da copaibeira, com propriedades anti-inflamatórias.',
                'image' => 'plantas.jpg',
                'price' => 39.90,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pomada de Arnica',
                'description' => 'Pomada feita com extrato de arnica, ideal para dores musculares e hematomas.',
                'image' => 'planta2.jpg',
                'price' => 24.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sabonete de Alecrim',
                'description' => 'Sabonete artesanal à base de alecrim, com aroma refrescante e propriedades revigorantes.',
                'image' => 'enci.jpg',
                'price' => 12.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Spray de Lavanda',
                'description' => 'Spray aromático calmante feito com óleo essencial de lavanda pura.',
                'image' => 'planta3.jpg', 
                'price' => 29.90,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
