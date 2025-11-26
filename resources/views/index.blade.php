<!DOCTYPE html>

<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Natureza em Casa</title>
    <link rel="icon" href="{{ asset('img/Natureza-removebg-preview.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
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
            <input type="text" placeholder="Buscar..." class="search-input">
            <button class="search-btn">🔍</button>
        </div>
    </div>

    <div class="header-right">
        <nav class="nav-links">
            <a href="{{ url('/article') }}" class="nav-link">Artigos</a>
            <a href="{{ url('/treatment') }}" class="nav-link active">Tratamentos</a>
            <a href="{{ url('/planta') }}" class="nav-link">Enciclopédia</a>
            <a href="{{ url('/product') }}" class="nav-link">Loja</a>
        </nav>
    </div>

    @guest
        <div class="header-buttons">
            <a href="{{ route('register') }}" class="header-btn">Registar</a>
            <a href="{{ route('login') }}" class="header-btn">Entrar</a>
        </div>
    @endguest

    @auth
        <div class="header-buttons">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="header-btn">Sair</button>
            </form>
        </div>
        <span class="ps-1 text-white">  
            {{
                Auth::user()
                ?
                    explode(" ", Auth::user()->name)[0]
                :
                    'Anônimo'
            }}
        </span>
    @endauth
</header>

<main>
    <div class="main-bg"></div>
    <div class="container">
        <section class="banner">
            <h1 class="banner-title">Natureza em Casa</h1>
            <p class="banner-subtitle">
                Uma jornada verde que abraça sua alma com sabedoria natural.<br>
                <em>— Jonathan Goerthe</em>
            </p>
        </section>

        <section class="content-section">
            <h2 class="section-title">Descubra o Mundo Natural</h2>
            <div class="card-container">
                <div class="card">
                    <img src="{{ asset('img/pant.jpg') }}" alt="Plantas" class="card-image">
                    <h3 class="card-title">Plantas</h3>
                    <p class="card-description">Essências vivas que purificam o ar e nutrem a Terra, criando um equilíbrio perfeito para a vida.</p>
                </div>
                <div class="card">
                    <img src="{{ asset('img/dec.jpg') }}" alt="Plantas na decoração" class="card-image">
                    <h3 class="card-title">Plantas na Decoração</h3>
                    <p class="card-description">Toques de verde que transformam espaços em oásis de serenidade e elegância.</p>
                </div>
                <div class="card">
                    <img src="{{ asset('img/remedios.jpg') }}" alt="Remédios Naturais" class="card-image">
                    <h3 class="card-title">Remédios Naturais</h3>
                    <p class="card-description">Poder curativo das ervas, um presente ancestral para harmonizar corpo e mente.</p>
                </div>
            </div>
        </section>
    </div>
</main>

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

<script src="{{ asset('js/index.js') }}"></script>


</body>
</html>
