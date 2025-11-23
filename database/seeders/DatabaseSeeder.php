<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Usuário de teste (somente se ainda não existir)
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'), // opcional
            ]);
        }

        // Ordem correta de seeders para evitar erro de FK:
        // 1) Usuários
        // 2) Plantas
        // 3) Tratamentos (depende de plantas e usuário)
        // 4) Produtos
        // 5) Enciclopédia (depende de plantas)
        // 6) Artigos (depende de usuários)
        $this->call([
            PlantasTableSeeder::class,       
            TreatmentsTableSeeder::class,    
            ProductsTableSeeder::class,      
            EncyclopediasTableSeeder::class, 
            ArticlesTableSeeder::class,      
        ]);
    }
}
