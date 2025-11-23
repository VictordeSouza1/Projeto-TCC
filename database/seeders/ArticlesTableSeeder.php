<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\User;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Busca o usuário de referência
        $user = User::first();

        if (!$user) {
            $this->command->info('Nenhum usuário encontrado. Crie um usuário antes de rodar este seeder.');
            return;
        }

        $articles = [
            [
                'user_id' => $user->user_id,
                'title' => 'A Importância da Biodiversidade para o Equilíbrio dos Ecossistemas',
                'author' => 'Amanda Ribeiro',
                'publication_date' => '2024-03-12',
                'description' => 'A biodiversidade é um dos pilares fundamentais para a manutenção da vida no planeta. Ela garante o equilíbrio ecológico, regula ciclos naturais e sustenta benefícios essenciais, como a purificação da água e a polinização de plantas. Entretanto, o avanço do desmatamento, da poluição e das mudanças climáticas tem acelerado de forma preocupante a perda de espécies. Esse artigo discute como a diminuição da fauna e flora afeta diretamente os ecossistemas e a qualidade de vida humana, destacando a importância de políticas públicas e ações comunitárias voltadas à conservação ambiental.',
                'scientific_references' => 'SOUZA, T. Conservação Ambiental e Biodiversidade. Revista Ecologia, 2022. | MARTINS, L. Impactos Ambientais e Desenvolvimento Sustentável. Editora Verde, 2021.',
                'image' => 'article1.jpg',
            ],
            [
                'user_id' => $user->user_id,
                'title' => 'Tráfico de Animais Silvestres no Brasil: Impactos e Desafios Jurídicos',
                'author' => 'Carlos Eduardo Silva',
                'publication_date' => '2024-05-20',
                'description' => 'O tráfico de animais silvestres é uma das atividades ilegais mais lucrativas do mundo, ficando atrás apenas do tráfico de drogas e armas. No Brasil, estima-se que milhões de animais sejam retirados da natureza anualmente, resultando em impactos irreversíveis na biodiversidade. Este artigo analisa as principais causas que alimentam essa prática, as consequências ecológicas e sociais e as lacunas existentes na legislação ambiental. Além disso, destaca a importância da educação ambiental como ferramenta de prevenção e conscientização da população.',
                'scientific_references' => 'RENCTAS. 1º Relatório Nacional sobre o Tráfico de Fauna Silvestre. Brasília, 2020. | BATISTA, M. Legislação Ambiental Brasileira. Editora Jurídica, 2019.',
                'image' => 'article2.jpg',
            ],
            [
                'user_id' => $user->user_id,
                'title' => 'Soluções Sustentáveis no Cotidiano: Pequenas Ações, Grande Impacto',
                'author' => 'Mariana Lopes',
                'publication_date' => '2024-01-15',
                'description' => 'A adoção de práticas sustentáveis no dia a dia é uma das formas mais eficazes de reduzir a pegada ambiental e contribuir para um planeta mais equilibrado. Medidas simples, como a redução do consumo de plástico, o reaproveitamento de resíduos, o uso consciente da água e a priorização de produtos ecológicos, podem transformar a relação das pessoas com o meio ambiente. Este artigo explora ações práticas e acessíveis que qualquer indivíduo pode incorporar à rotina, além de evidenciar os benefícios coletivos dessas escolhas para as futuras gerações.',
                'scientific_references' => 'FREITAS, G. Sustentabilidade Prática. Revista Natureza, 2023. | OLIVEIRA, D. Consumo Consciente e Sociedade. Editora Eco, 2022.',
                'image' => 'article3.jpg',
            ],
            [
                'user_id' => $user->user_id,
                'title' => 'Educação Ambiental na Escola: Caminhos para uma Sociedade Consciente',
                'author' => 'Jéssica Moreira',
                'publication_date' => '2024-02-28',
                'description' => 'A educação ambiental desempenha um papel essencial no desenvolvimento de uma sociedade sustentável. Quando inserida no contexto escolar, promove não apenas conhecimento teórico, mas também atitudes responsáveis em relação ao meio ambiente. Este artigo discute estratégias pedagógicas, atividades práticas e projetos interdisciplinares que podem ser implementados nas escolas. Além disso, aborda como a formação de alunos críticos e engajados pode impactar diretamente a comunidade e influenciar políticas de preservação ambiental.',
                'scientific_references' => 'BRASIL. Política Nacional de Educação Ambiental. Lei 9.795/99. | SANTOS, A. Práticas Pedagógicas em Educação Ambiental. Editora Saber, 2021.',
                'image' => 'article4.jpg',
            ],
            [
                'user_id' => $user->user_id,
                'title' => 'Mudanças Climáticas: Entendendo as Causas e os Efeitos no Brasil',
                'author' => 'Lucas Ferreira',
                'publication_date' => '2024-06-01',
                'description' => 'Nos últimos anos, o Brasil tem enfrentado uma intensificação de eventos climáticos extremos, como enchentes, secas e ondas de calor. Esses fenômenos estão diretamente relacionados ao aquecimento global e às transformações climáticas observadas em todo o mundo. O artigo apresenta uma visão detalhada sobre as principais causas desse fenômeno, seus impactos diretos na agricultura, na economia e na saúde pública, além de destacar a urgência de políticas de mitigação e adaptação. A conscientização e o engajamento social são essenciais para minimizar os danos e proteger as futuras gerações.',
                'scientific_references' => 'IPCC. Relatório de Avaliação Climática, 2023. | RIBEIRO, V. Mudanças Climáticas e Sociedade. Editora Clima, 2022.',
                'image' => 'article5.jpg',
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
