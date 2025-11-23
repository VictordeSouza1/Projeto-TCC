<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Encyclopedia;

class EncyclopediasTableSeeder extends Seeder
{
    public function run(): void
    {
        $encyclopedias = [
            [
                'plant_id' => 1,
                'detailed_description' => 'A camomila é uma planta medicinal tradicionalmente utilizada para aliviar ansiedade, cólicas, má digestão e ajudar no sono. Suas flores possuem compostos calmantes e anti-inflamatórios.',
                'illustrative_images' => json_encode(['enciclopedia/camomila_1.jpg','enciclopedia/camomila_2.jpg']),
            ],
            [
                'plant_id' => 2,
                'detailed_description' => 'A arnica é conhecida por sua ação anti-inflamatória e cicatrizante. É usada em compressas, pomadas e tinturas para reduzir dores musculares e hematomas.',
                'illustrative_images' => json_encode(['enciclopedia/arnica_1.jpg','enciclopedia/arnica_2.jpg']),
            ],
            [
                'plant_id' => 3,
                'detailed_description' => 'O alecrim é uma erva aromática muito utilizada na culinária e na medicina natural. Possui propriedades estimulantes, antioxidantes e melhora a circulação.',
                'illustrative_images' => json_encode(['enciclopedia/alecrim_1.jpg','enciclopedia/alecrim_2.jpg']),
            ],
            [
                'plant_id' => 4,
                'detailed_description' => 'A lavanda é famosa por seu aroma calmante e relaxante. Seus óleos essenciais são usados para aliviar estresse, insônia e irritações na pele.',
                'illustrative_images' => json_encode(['enciclopedia/lavanda_1.jpg','enciclopedia/lavanda_2.jpg']),
            ],
            [
                'plant_id' => 5,
                'detailed_description' => 'A hortelã possui propriedades digestivas e refrescantes. É amplamente usada em chás, compressas e cosméticos naturais.',
                'illustrative_images' => json_encode(['enciclopedia/hortela_1.jpg','enciclopedia/hortela_2.jpg']),
            ],
        ];

        foreach ($encyclopedias as $entry) {
            // Evita duplicidade usando updateOrCreate
            Encyclopedia::updateOrCreate(
                ['plant_id' => $entry['plant_id']],
                [
                    'detailed_description' => $entry['detailed_description'],
                    'illustrative_images' => $entry['illustrative_images'],
                ]
            );
        }
    }
}
