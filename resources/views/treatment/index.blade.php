<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Tratamentos Naturais - Natureza em Casa</title>

    <link rel="icon" href="{{ asset('img/Natureza-removebg-preview.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/treatment.css') }}">
    <link rel="stylesheet" href="{{ asset('css/imagem.css') }}">
</head>

<body>

    {{-- HEADER --}}
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
                <form method="GET" action="{{ route('treatment.index') }}">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar tratamento..." class="search-input">
                    <button class="search-btn">🔍</button>
                </form>
            </div>
        </div>

        <nav class="nav-links">
            <a href="{{ url('/article') }}" class="nav-link">Artigos</a>
            <a href="{{ url('/product') }}" class="nav-link">Loja</a>
            <a href="{{ url('/treatment') }}" class="nav-link active">Tratamentos</a>
        </nav>

        <div class="header-buttons">
            <button class="header-btn">Entrar</button>
        </div>
    </header>

    {{-- BANNER --}}
    <section class="banner">
        <h1 class="banner-title">Tratamentos Naturais</h1>
    </section>

    {{-- LISTAGEM --}}
    <section class="products-section">

        <div class="title-row">
            <h2 class="section-title">Todos os Tratamentos</h2>

            <a href="{{ route('treatment.create') }}" class="btn-add">
                + Cadastrar Tratamento
            </a>
        </div>

        <div class="carousel-wrapper">
            <button class="carousel-btn left-btn">❮</button>

            <div class="carousel-container">
                <div class="card-carousel">

                    @foreach ($treatments as $treatment)
                        <div class="card">

                            {{-- IMAGEM DA PLANTA (SE EXISTE) --}}
                            @php
                                $img = $treatment->planta && $treatment->planta->imagem
                                    ? 'storage/' . $treatment->planta->imagem
                                    : 'img/default-plant.jpg';
                            @endphp

                            <img 
                                src="{{ asset($img) }}"
                                alt="Imagem da Planta"
                                class="card-image">

                            {{-- TÍTULO = NOME DA PLANTA --}}
                            <h3 class="card-title">
                                {{ $treatment->planta->nome ?? 'Planta não informada' }}
                            </h3>

                            {{-- DESCRIÇÃO --}}
                            <p class="card-description">
                                <strong>Descrição:</strong> 
                                {{ Str::limit($treatment->descricao, 90) }} <br>

                                <strong>Criado por:</strong> 
                                {{ $treatment->user->name ?? 'Usuário' }} <br>

                                <strong>Data:</strong> 
                                {{ $treatment->created_at->format('d/m/Y') }}
                            </p>

                            {{-- BOTÕES --}}
                            <div class="card-buttons">

                                <a href="{{ route('treatment.show', $treatment->id) }}" class="header-btn">
                                    Ver Mais
                                </a>

                                <a href="{{ route('treatment.edit', $treatment->id) }}" class="header-btn btn-edit">
                                    Editar
                                </a>

                                <form action="{{ route('treatment.destroy', $treatment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="header-btn btn-remove" onclick="return confirm('Tem certeza que deseja remover?');">
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
