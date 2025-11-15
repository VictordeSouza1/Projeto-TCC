<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Produto</title>

    <!-- Importa seu CSS principal -->
    <link rel="stylesheet" href="{{ asset('css/encyclopedia.css') }}">
</head>

<body>

    <!-- HEADER (igual ao restante do site) -->
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
           <a href="{{ route('product.index') }}" 
              style="font-size: 40px; color: white; text-decoration: none; padding: 5px 15px;">
              ←
           </a>
        </div>
    </header>

    <!-- CONTEÚDO PRINCIPAL EM CARD BONITO -->
    <section style="display: flex; justify-content: center; margin-top: 40px;">

        <div class="card no-hover" style="width: 600px; padding: 25px; text-align: left;">

            <h2 style="color: var(--green-dark); margin-bottom: 20px; font-family: 'Merriweather', serif;">
                Informações do Produto
            </h2>

            <p><strong>ID:</strong> {{ $product->id }}</p>
            <p><strong>Nome:</strong> {{ $product->name }}</p>
            <p><strong>Preço:</strong> R$ {{ number_format($product->price, 2, ',', '.') }}</p>
            <p><strong>Descrição:</strong> {{ $product->description }}</p>

            @if($product->image)
                <p><strong>Imagem:</strong></p>
                <img src="{{ asset('storage/' . $product->image) }}" 
                     style="width: 100%; max-width: 450px; border-radius: 12px; margin-top: 10px;">
            @endif

            <br><br>

            <div style="display: flex; gap: 10px;">
                <a href="{{ route('product.edit', $product->id) }}" 
                   class="header-btn" 
                   style="padding: 10px 20px;">
                    Editar
                </a>

                <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                      onsubmit="return confirm('Tem certeza que deseja deletar este produto?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="header-btn" style="padding: 10px 20px;">
                        Remover
                    </button>
                </form>
            </div>

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
