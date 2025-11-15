<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enciclopédia - Natureza em Casa</title>

    <link rel="icon" href="{{ asset('img/Natureza-removebg-preview.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/encyclopedia.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Merriweather:wght@700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="header-left">
            <div class="logo-wrapper">
                <img src="{{ asset('img/Natureza-removebg-preview.png') }}" alt="Logo Natureza em Casa" class="logo">
            </div>
        </div>

        <div class="header-center">
            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Busque por plantas, remédios...">
                <button class="search-btn">🔍</button>
            </div>
        </div>

        <nav class="nav-links">
            <a href="{{ url('/') }}" class="nav-link">Artigos</a>
            <a href="{{ url('/') }}" class="nav-link">Tratamentos</a>
            <a href="{{ url('/') }}" class="nav-link">Loja</a>
        </nav>

         <div class="header-buttons">
            <button class="header-btn">Entrar</button>
        </div>
    </header>
        </div>
    </header>

    <!-- Banner -->
    <section class="banner">
        <h1 class="banner-title">Enciclopédia</h1>
    </section>

    <!-- LISTAGEM DINÂMICA DE PLANTAS -->
    <section class="products-section">
        <h2 class="section-title">Plantas</h2>

        <div class="carousel-wrapper">
            <button class="carousel-btn left-btn">❮</button>

            <div class="carousel-container">
                <div class="card-carousel">

                    @foreach ($plantas as $planta)
                        <div class="card">

                            <!-- Imagem padrão TEMPORÁRIA até você adicionar imagem no DB -->
                            <img src="{{ asset('img/default-planta.jpg') }}" alt="Imagem Planta" class="card-image">

                            <h3 class="card-title">{{ $planta->nome }}</h3>
                            <p class="card-description">{{ $planta->descricao }}</p>

                           <!-- BOTÕES DENTRO DO CARD -->
<a href="{{ route('planta.create') }}" class="header-btn btn-create">
                            Cadastrar Planta
                        </a>

                        <div style="margin-top: 10px; display: flex; gap: 6px; flex-direction: column;">
                            
                            <a href="{{ route('planta.show', $planta->id) }}" class="header-btn">
                                Ver Mais
                            </a>

                            <a href="{{ route('planta.edit', $planta->id) }}" class="header-btn btn-edit">
                                Editar
                            </a>

                            <form action="{{ route('planta.destroy', $planta->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="header-btn btn-remove">
                                    Remover
                                </button>
                            </form>
                        </div>

                        </div>
                    @endforeach

                </div>
            </div>

            <button class="carousel-btn right-btn">❯</button>
        </div>
    </section>

    <!-- CATEGORIAS e ALFABETO (inalterado) -->
    <section class="categories-section">
        <h2 class="section-title">Categorias</h2>
        <div class="categories-grid">
            <a href="#" class="category-tag">Babosa</a>
            <a href="#" class="category-tag">Manjericão</a>
            <a href="#" class="category-tag">Flor</a>
            <a href="#" class="category-tag">Camomila</a>
            <a href="#" class="category-tag">Histeria</a>
            <a href="#" class="category-tag">Rosa</a>
            <a href="#" class="category-tag">Árvores</a>
            <a href="#" class="category-tag">Cacto</a>
            <a href="#" class="category-tag">Orquídea</a>
        </div>

        <h3 class="alphabet-title">Filtrar por letra:</h3>
        <div class="alphabet-grid">
            @foreach (range('A', 'Z') as $letra)
                <a href="#" class="alphabet-tag">{{ $letra }}</a>
            @endforeach
        </div>
    </section>

    <!-- Rodapé -->
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

    <script src="{{ asset('js/encyclopedia.js') }}"></script>
</body>
</html>
