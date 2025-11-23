<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Planta;

class PlantasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plantas = [
            [
                'nome' => 'Camomila',
                'tipo' => 'Medicinal',
                'descricao' => 'A camomila é conhecida por suas propriedades calmantes, auxiliando no sono e na digestão.',
                'imagem' => 'camomila.jpg',
            ],
            [
                'nome' => 'Arnica',
                'tipo' => 'Medicinal',
                'descricao' => 'A arnica é utilizada para reduzir inflamações, hematomas e dores musculares.',
                'imagem' => 'arnica.jpg',
            ],
            [
                'nome' => 'Alecrim',
                'tipo' => 'Aromática',
                'descricao' => 'O alecrim estimula a circulação, possui ação antioxidante e é muito usado na culinária.',
                'imagem' => 'alecrim.jpg',
            ],
            [
                'nome' => 'Lavanda',
                'tipo' => 'Aromática',
                'descricao' => 'A lavanda é famosa por seu efeito calmante e relaxante, utilizada em óleos essenciais e chás.',
                'imagem' => 'lavanda.jpg',
            ],
            [
                'nome' => 'Hortelã',
                'tipo' => 'Aromática',
                'descricao' => 'A hortelã possui efeito digestivo, refrescante e é muito usada em chás, cosméticos e receitas.',
                'imagem' => 'hortela.jpg',
            ],
        ];

        foreach ($plantas as $planta) {
            Planta::create($planta);
        }
    }
}
