<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Carrinho - Natureza em Casa</title>

    <link rel="icon" href="{{ asset('img/Natureza-removebg-preview.png') }}">
    <link rel="stylesheet" href="{{ asset('css/loja.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('css/imagem.css') }}">
    
    {{-- Fontes --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Merriweather:wght@700&display=swap" rel="stylesheet">
</head>
<body>

<header class="header">
   <div class="header-left">
        <div class="logo-wrapper">
            <a href="{{ route('product.index') }}"> 
                <img src="{{ asset('img/Natureza-removebg-preview.png') }}" 
                    alt="Logo Natureza em Casa" 
                    class="logo"
                    style="cursor: pointer;">
            </a>
        </div>
    </div>

    <nav class="nav-links">
        <a href="{{ route('product.index') }}" class="nav-link">Loja</a>
        <a href="#" class="nav-link">Categorias</a>
        <a href="#" class="nav-link">Contato</a>
    </nav>

    <div class="header-buttons">
        <a href="{{ route('cart.index') }}" class="header-btn cart-btn">
            🛒 {{ array_sum(array_column(session('cart', []), 'quantidade')) }}
        </a>
    </div>
</header>

<main class="cart-page">
    <div class="container">
        <h1 class="cart-title">🛒 Meu Carrinho</h1>

        <div class="cart-grid">
            <!-- ITENS DO CARRINHO -->
            <section class="cart-items">
                @forelse ($cart as $item)
                    <div class="cart-item">

                        <!-- IMAGEM DO ITEM (agora com class="item-img") -->
                        <img src="{{ asset('storage/' . $item['imagem']) }}" 
                             class="item-img" 
                             alt="{{ $item['nome'] }}">

                        <div class="item-info">
                            <h3>{{ $item['nome'] }}</h3>
                            <p>{{ $item['descricao'] }}</p>
                            <strong>R$ {{ number_format($item['preco'], 2, ',', '.') }}</strong>

                            <form action="{{ route('cart.update', $item['id']) }}" method="POST" class="qty-form">
                                @csrf
                                <input type="number" name="quantidade" value="{{ $item['quantidade'] }}" min="1">
                                <button type="submit" class="update-btn">Atualizar</button>
                            </form>

                            <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                @csrf
                                <button type="submit" class="remove-btn">Remover</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="empty-cart">Seu carrinho está vazio 🥺</p>
                @endforelse
            </section>

            <!-- RESUMO -->
            <aside class="cart-summary">
                @php
                    $subtotal = 0;
                    foreach ($cart as $item) {
                        $subtotal += $item['preco'] * $item['quantidade'];
                    }
                    $frete = $subtotal > 0 ? 9.90 : 0;
                    $total = $subtotal + $frete;
                @endphp

                <h2>Resumo do Pedido</h2>

                <div class="summary-line">
                    <span>Subtotal</span>
                    <strong>R$ {{ number_format($subtotal, 2, ',', '.') }}</strong>
                </div>

                <div class="summary-line">
                    <span>Frete</span>
                    <strong>R$ {{ number_format($frete, 2, ',', '.') }}</strong>
                </div>

                <hr>

                <div class="summary-line total-line">
                    <span>Total</span>
                    <strong>R$ {{ number_format($total, 2, ',', '.') }}</strong>
                     </div>
                            @if ($subtotal > 0)
                    <a href="{{ route('cart.checkout') }}" class="btn checkout-btn">
                        Finalizar Compra
                    </a>
                @endif

                @if ($subtotal > 0)
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        <button class="btn clear-cart-btn">
                            Esvaziar Carrinho
                        </button>
                    </form>
                @endif

            </aside>
        </div>
    </div>
</main>

<footer class="footer">
    <p>© 2025 Natureza em Casa</p>
</footer>

</body>
</html>
