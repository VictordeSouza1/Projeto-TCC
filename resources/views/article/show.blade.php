<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }} - Informações</title>

    <link rel="stylesheet" href="{{ asset('css/encyclopedia.css') }}">
    <link rel="stylesheet" href="{{ asset('css/imagem.css') }}">

    <style>
        .article-container {
            width: 700px;
            padding: 30px;
            background: #ffffff;
            border-radius: 18px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.12);
            margin-bottom: 60px;
        }

        .article-title {
            color: var(--green-dark);
            font-family: 'Merriweather', serif;
            margin-bottom: 15px;
            font-size: 30px;
            text-align: center;
        }

        .back-btn {
            font-size: 28px;
            background: var(--green-dark);
            padding: 10px 18px;
            border-radius: 50%;
            color: white;
            text-decoration: none;
            transition: 0.2s;
        }

        .back-btn:hover {
            background: var(--green-mid);
        }

        .article-image-box {
            width: 100%;
            max-height: 220px; /* MENOR */
            overflow: hidden;
            border-radius: 14px;
            margin: 0 auto 25px auto; /* centraliza */
            box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        }

        .article-image-box img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .content-block p {
            line-height: 1.6;
            margin-bottom: 14px;
            font-size: 17px;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header class="header">
        <div class="header-left">
            <div class="logo-wrapper">
                <a href="/">
                    <img src="{{ asset('img/Natureza-removebg-preview.png') }}" 
                         alt="Logo Natureza em Casa" 
                         class="logo"
                         style="cursor: pointer;">
                </a>
            </div>
            <div class="brand-title">Natureza em Casa</div>
        </div>

        <div class="header-buttons">
            <a href="{{ route('article.index') }}" class="back-btn">←</a>
        </div>
    </header>

    <!-- CONTEÚDO PRINCIPAL -->
    <section style="display: flex; justify-content: center; margin-top: 50px;">

        <div class="article-container">

            <h2 class="article-title">{{ $article->title }}</h2>

            {{-- IMAGEM LOGO DEPOIS DO TÍTULO --}}
            @if($article->image)
                <div class="article-image-box">
                    <img src="{{ asset('storage/' . $article->image) }}" 
                         alt="Imagem do Artigo">
                </div>
            @endif

            <div class="content-block">

                <p><strong>Autor:</strong> {{ $article->author ?? 'Não informado' }}</p>

                <p><strong>Publicado em:</strong>
                    {{ \Carbon\Carbon::parse($article->publication_date)->format('d/m/Y') }}
                </p>

                <p><strong>Descrição:</strong></p>
                <p>{{ $article->description }}</p>

                @if($article->scientific_references)
                    <p><strong>Referências Científicas:</strong></p>
                    <p>{{ $article->scientific_references }}</p>
                @endif

            </div>

            <br><br>

        </div>

    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <p class="footer-disclaimer">© 2025 Natureza em Casa — Todos os direitos reservados.</p>
        <div class="social-icons">
            <a href="#" class="social-link">🌿</a>
            <a href="#" class="social-link">🌱</a>
            <a href="#" class="social-link">🌸</a>
        </div>
    </footer>

</body>
</html>
