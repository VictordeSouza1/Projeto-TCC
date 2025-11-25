<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">   <!-- AQUI -->

    <title>Loja - Natureza em Casa</title>
    <link rel="icon" href="{{ asset('img/Natureza-removebg-preview.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/loja.css') }}">


    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Merriweather:wght@700&display=swap" rel="stylesheet">
</head>

<body>

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
    </div>

    <div class="header-center">
        <div class="search-bar">
            <input type="text" class="search-input" placeholder="Busque por plantas, remédios...">
            <button class="search-btn">🔍</button>
        </div>
    </div>

    <nav class="nav-links">
        <a href="{{ url('/') }}" class="nav-link">Categorias</a>
        <a href="#" class="nav-link">Ofertas</a>
        <a href="{{ route('product.create') }}" class="nav-link">Vender</a>
        <a href="#" class="nav-link">Contato</a>
    </nav>

    <div class="header-buttons">
        <button class="header-btn">Crie a sua Conta</button>
        <button class="header-btn">Entrar</button>

        <a href="{{ route('cart.index') }}" class="header-btn cart-btn"> 🛒 </a>
    </div>
</header>

<!-- Banner -->
<section class="banner">
    <h1 class="banner-title">LOJA</h1>
</section>

<!-- Produtos -->
<section class="products-section">

    <div class="title-row" style="display: flex; justify-content: space-between; align-items: center;">
        <h2 class="section-title">Destaque</h2>

        <a href="{{ route('product.create') }}" class="btn-add">
            + Cadastrar Produto
        </a>
    </div>

    <div class="carousel-wrapper">
        <button class="carousel-btn left-btn">❮</button>

        <div class="carousel-container">
            <div class="card-carousel">

                @foreach($products as $product)
                <div class="card">

                    <!-- Imagem -->
                    <img src="{{ asset('storage/' . $product->image) }}" 
                        alt="{{ $product->name }}" 
                        class="card-image">

                    <!-- Nome -->
                    <h3 class="card-title">{{ $product->name }}</h3>

                    <!-- Descrição curta -->
                    <p class="card-description">{{ \Illuminate\Support\Str::limit($product->description, 60) }}</p>

                    <!-- Preço -->
                    <div class="price">
                        R$ {{ number_format($product->price, 2, ',', '.') }}
                    </div>

                    <div class="rating">★ ★ ★ ★ ☆</div>

                    <!-- Botões -->
                    <div class="card-buttons" style="display: flex; gap: 8px; margin-top: 10px;">

                       <button class="add-to-cart-btn"
                        onclick="addToCart({{ $product->id }})"
                        style="width: 100%; padding: 8px 0; background: #1ba55c; color: white;
                            border-radius: 5px; border: none; cursor: pointer;">
                    Adicionar ao carrinho
                </button>


                        <!-- Ver mais -->
                        <a href="{{ route('product.show', $product->id) }}"
                           style="flex: 1; text-align: center; padding: 8px 0; background: #1ba55c; color: white; border-radius: 5px; text-decoration: none;">
                            Ver Mais
                        </a>

                        <!-- Editar -->
                        <a href="{{ route('product.edit', $product->id) }}"
                           style="flex: 1; text-align: center; padding: 8px 0; background: #ffc107; color: black; border-radius: 5px; text-decoration: none;">
                            Editar
                        </a>

                        <!-- Remover -->
                        <form action="{{ route('product.destroy', $product->id) }}" 
                              method="POST" 
                              style="flex: 1; margin: 0;">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    style="width: 100%; padding: 8px 0; background: #dc3545; color: white; border-radius: 5px; border: none; cursor: pointer;">
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

<!-- Categorias -->
<section class="categories-section">
    <h2 class="section-title">Categorias</h2>
    <div class="categories-grid">
        <a href="#" class="category-tag">Artrite</a>
        <a href="#" class="category-tag">Manejerica</a>
        <a href="#" class="category-tag">Flor</a>
        <a href="#" class="category-tag">Remédio</a>
        <a href="#" class="category-tag">Colesterol</a>
        <a href="#" class="category-tag">Pênfigo</a>
        <a href="#" class="category-tag">Inflamação</a>
        <a href="#" class="category-tag">Espinheira</a>
        <a href="#" class="category-tag">Léptir</a>
    </div>

    <h3 class="alphabet-title">Filtrar por letra:</h3>
    <div class="alphabet-grid">
        @foreach(range('A','Z') as $letra)
            <a href="#" class="alphabet-tag">{{ $letra }}</a>
        @endforeach
    </div>
</section>

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
