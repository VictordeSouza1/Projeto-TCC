<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações da Planta</title>

    <!-- Importa seu CSS principal -->
    <link rel="stylesheet" href="{{ asset('css/encyclopedia.css') }}">
    <link rel="stylesheet" href="{{ asset('css/imagem.css') }}">
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

        <div class="header-center"></div>

        <div class="header-buttons">
            <a href="{{ route('planta.index') }}" 
               style="font-size: 40px; color: white; text-decoration: none; padding: 5px 15px;">
                ←
            </a>
        </div>
    </header>

    <!-- CONTEÚDO PRINCIPAL -->
    <section style="display: flex; justify-content: center; margin-top: 40px;">

        <div class="card no-hover" style="width: 600px; padding: 25px; text-align: left;">

            <h2 style="color: var(--green-dark); margin-bottom: 20px; font-family: 'Merriweather', serif;">
                Informações da Planta
            </h2>

            <p><strong>ID:</strong> {{ $planta->id }}</p>
            <p><strong>Nome:</strong> {{ $planta->nome }}</p>
            <p><strong>Tipo:</strong> {{ $planta->tipo }}</p>
            <p><strong>Descrição:</strong> {{ $planta->descricao }}</p>

            {{-- IMAGEM --}}
            @if($planta->imagem)
                <p><strong>Imagem:</strong></p>

                <div class="product-image-box">
                    <img src="{{ asset('storage/' . $planta->imagem) }}" 
                         alt="Imagem da planta" 
                         class="product-image">
                </div>
            @endif

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
