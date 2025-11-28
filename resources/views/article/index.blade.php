<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Artigos - Natureza em Casa</title>

    <link rel="icon" href="{{ asset('img/Natureza-removebg-preview.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/article.css') }}">
     <link rel="stylesheet" href="{{ asset('css/imagem.css') }}">
</head>

<body>
    <header class="header">
        <div class="header-left">
            <div class="logo-wrapper">
                <a href="/">
                    <img src="{{ asset('img/Natureza-removebg-preview.png') }}" alt="Logo Natureza em Casa" class="logo">
                </a>
            </div>
        </div>

        <div class="header-center">
            <div class="search-bar">
                <input type="text" placeholder="Buscar..." class="search-input">
                <button class="search-btn">🔍</button>
            </div>
        </div>

        <nav class="nav-links">
            <a href="{{ url('/planta') }}" class="nav-link">Enciclopédia</a>
            <a href="{{ url('/product') }}" class="nav-link">Loja</a>
            <a href="{{ url('/treatment') }}" class="nav-link">Tratamentos</a>
        </nav>

        @guest
        <div class="header-buttons">
            <a href="{{ route('register') }}" class="header-btn">Registar</a>
            <a href="{{ route('login') }}" class="header-btn">Entrar</a>
        </div>
    @endguest
    </header>

    <section class="banner">
        <h1 class="banner-title">Artigos</h1>
    </section>

    <section class="products-section">

        <div class="title-row">
            <h2 class="section-title">Todos os Artigos</h2>

            @can('create', App\Models\Article::class)
                <a href="{{ route('article.create') }}" class="btn-add">
                    + Cadastrar Artigo
                </a>
            @endcan
        </div>

        <div class="carousel-wrapper">
            <button class="carousel-btn left-btn">‹</button>

            <div class="carousel-container">
                <div class="card-carousel">

                    @foreach ($articles as $article)
                        <div class="card">

                            {{-- IMAGEM DO ARTIGO --}}
                            @if ($article->image)
                                <img 
                                    src="{{ asset('storage/' . $article->image) }}"
                                    alt="Imagem do Artigo"
                                    class="card-image">
                            @else
                                <img 
                                    src="{{ asset('img/default-article.jpg') }}"
                                    alt="Imagem Padrão"
                                    class="card-image">
                            @endif

                            <h3 class="card-title">{{ $article->title }}</h3>

                            <p class="card-description">
                                <strong>Autor:</strong> {{ $article->author }}<br>
                                <strong>Publicado em:</strong> {{ date('d/m/Y', strtotime($article->publication_date)) }}
                            </p>

                            {{-- AÇÕES --}}
                            <div class="card-buttons">

                                @can('view', $article)
                                <a href="{{ route('article.show', $article->article_id) }}" class="header-btn">
                                    Ver Mais
                                </a>
                                @endcan

                                @can('update', $article)
                                <a href="{{ route('article.edit', $article->article_id) }}" class="header-btn btn-edit">
                                    Editar
                                </a>
                                @endcan
                                
                                @can('delete', $article)
                                <form action="{{ route('article.destroy', $article->article_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="header-btn btn-remove" onclick="return confirm('Tem certeza que deseja remover?');">
                                        Remover
                                    </button>
                                </form>
                                @endcan

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <button class="carousel-btn right-btn">›</button>
        </div>

    </section>

    {{-- FOOTER --}}
    <footer class="footer">
        <p class="footer-text">© 2025 Natureza em Casa. Todos os direitos reservados.</p>
        <p class="footer-disclaimer">As informações aqui são educativas e não substituem orientação profissional de saúde.</p>

        <div class="social-icons">
            <a href="#" class="social-link"><span>🌐</span></a>
            <a href="#" class="social-link"><span>🐦</span></a>
            <a href="#" class="social-link"><span>📸</span></a>
            <a href="#" class="social-link"><span>💼</span></a>
        </div>
    </footer>

    <script src="{{ asset('js/loja.js') }}"></script>

</body>
</html>
