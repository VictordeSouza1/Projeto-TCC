<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Tratamento</title>

    <!-- CSS -->
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
                         class="logo">
                </a>
            </div>

            <div class="brand-title">Natureza em Casa</div>
        </div>

        <div class="header-center"></div>

        <div class="header-buttons">
            <a href="{{ route('treatment.index') }}" 
               style="font-size: 40px; color: white; text-decoration: none; padding: 5px 15px;">
                ←
            </a>
        </div>
    </header>

    <!-- CONTEÚDO PRINCIPAL -->
    <section style="display: flex; justify-content: center; margin-top: 40px;">

        <div class="card no-hover" style="width: 650px; padding: 25px; text-align: left;">

            <h2 style="color: var(--green-dark); margin-bottom: 20px; font-family: 'Merriweather', serif;">
                Detalhes do Tratamento
            </h2>

            <p><strong>ID:</strong> {{ $treatment->id }}</p>

            <p>
                <strong>Planta relacionada:</strong> 
                {{ $treatment->planta->nome ?? 'Não informada' }}
            </p>

            <p><strong>Nome do Tratamento:</strong> {{ $treatment->nome }}</p>

            @if($treatment->descricao)
                <p><strong>Descrição:</strong> {{ $treatment->descricao }}</p>
            @endif

            @if($treatment->modo_preparo)
                <p><strong>Modo de Preparo:</strong> {{ $treatment->modo_preparo }}</p>
            @endif

            @if($treatment->observacoes)
                <p><strong>Observações:</strong> {{ $treatment->observacoes }}</p>
            @endif

            <p><strong>Criado por:</strong> {{ $treatment->user->name ?? 'Usuário' }}</p>

            <p><strong>Data:</strong> {{ $treatment->created_at->format('d/m/Y') }}</p>

            <br>

            {{-- IMAGEM DA PLANTA --}}
            @if($treatment->planta && $treatment->planta->imagem)
                <p><strong>Imagem da planta:</strong></p>

                <div class="product-image-box">
                    <img src="{{ asset('storage/' . $treatment->planta->imagem) }}" 
                         alt="Imagem da planta" 
                         class="product-image">
                </div>
            @else
                <p><strong>Imagem da planta:</strong> Não disponível</p>
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
