<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Treatment;

class TreatmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $treatments = [
            [
                'plant_id' => 1, // Camomila
                'user_id' => 1,  // Usuário de teste
                'nome' => 'Chá de Camomila Relaxante',
                'descricao' => 'Auxilia no sono e na digestão, ideal para noites agitadas ou problemas leves de ansiedade.',
                'modo_preparo' => 'Coloque 1 colher de chá das flores de camomila em 200ml de água fervente. Abafe por 5 minutos. Coe e beba 2 vezes ao dia.',
                'observacoes' => 'Evitar durante gravidez sem orientação médica.',
            ],
            [
                'plant_id' => 2, // Arnica
                'user_id' => 1,
                'nome' => 'Pomada de Arnica para Contusões',
                'descricao' => 'Reduz hematomas e alivia dores musculares.',
                'modo_preparo' => 'Misture 50g de óleo vegetal com 10g de flores de arnica. Aqueça em banho-maria por 30 minutos, coe e adicione 10g de cera de abelha. Use sobre a área afetada.',
                'observacoes' => 'Não aplicar em feridas abertas.',
            ],
            [
                'plant_id' => 3, // Alecrim
                'user_id' => 1,
                'nome' => 'Infusão de Alecrim Estimulante',
                'descricao' => 'Melhora a circulação e proporciona energia mental.',
                'modo_preparo' => 'Ferva 200ml de água e adicione 1 colher de chá de folhas de alecrim. Deixe em infusão por 10 minutos e coe antes de beber.',
                'observacoes' => 'Evitar consumo excessivo por pessoas com pressão alta.',
            ],
            [
                'plant_id' => 4, // Lavanda
                'user_id' => 1,
                'nome' => 'Óleo Essencial de Lavanda Relaxante',
                'descricao' => 'Promove relaxamento e alívio do estresse.',
                'modo_preparo' => 'Coloque 10 gotas de óleo essencial de lavanda em 50ml de óleo base (como óleo de amêndoas). Massageie nas têmporas ou braços.',
                'observacoes' => 'Evitar contato com olhos e mucosas.',
            ],
            [
                'plant_id' => 5, // Hortelã
                'user_id' => 1,
                'nome' => 'Chá de Hortelã Digestivo',
                'descricao' => 'Alivia desconfortos digestivos e refresca.',
                'modo_preparo' => 'Ferva 200ml de água, adicione 1 colher de chá de folhas de hortelã e abafe por 5 minutos. Coe e beba após as refeições.',
                'observacoes' => 'Não recomendado para pessoas com refluxo intenso.',
            ],
        ];

        foreach ($treatments as $treatment) {
            Treatment::create($treatment);
        }
    }
}
