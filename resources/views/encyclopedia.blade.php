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

    <!-- Banner -->
    <section class="banner">
        <h1 class="banner-title">Enciclopédia</h1>
    </section>

    <!-- Produtos em Destaque -->
    <section class="products-section">
        <h2 class="section-title">Flores</h2>
        <div class="carousel-wrapper">
            <button class="carousel-btn left-btn">❮</button>
            <div class="carousel-container">
                <div class="card-carousel">
                    <div class="card">
                        <img src="{{ asset('img/planta4.jpg') }}" alt="Girassol Natural" class="card-image">
                        <h3 class="card-title">Girassol Natural</h3>
                        <p class="card-description">Essência viva que ilumina ambientes.</p>
                    </div>

                    <div class="card">
                        <img src="{{ asset('img/planta2.jpg') }}" alt="Girassol Natural" class="card-image">
                        <h3 class="card-title">Girassol Natural</h3>
                        <p class="card-description">Essência viva que ilumina ambientes.</p>
                    </div>

                    <div class="card">
                        <img src="{{ asset('img/planta3.jpg') }}" alt="Girassol em Vaso" class="card-image">
                        <h3 class="card-title">Girassol em Vaso</h3>
                        <p class="card-description">Decoração e serenidade.</p>
                    </div>

                    <div class="card">
                        <img src="{{ asset('img/planta4.jpg') }}" alt="Girassol Medicinal" class="card-image">
                        <h3 class="card-title">Girassol Medicinal</h3>
                        <p class="card-description">Remédio natural para harmonizar.</p>
                    </div>

                    <div class="card">
                        <img src="{{ asset('img/planta2.jpg') }}" alt="Girassol Decorativo" class="card-image">
                        <h3 class="card-title">Girassol Decorativo</h3>
                        <p class="card-description">Transforme espaços em oásis.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-btn right-btn">❯</button>
        </div>
    </section>

    <!-- Promoções -->
    <section class="products-section">
        <h2 class="section-title">Ervas</h2>
        <div class="carousel-wrapper">
            <button class="carousel-btn left-btn">❮</button>
            <div class="carousel-container">
                <div class="card-carousel">
                    <div class="card">
                        <img src="img/planta2.jpg" alt="Óleo Essencial" class="card-image">
                        <h3 class="card-title">Óleo Essencial</h3>
                        <p class="card-description">Purificador natural.</p>
                    </div>

                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1518837695005-2083093ee35b?w=300&h=300&fit=crop&crop=face" alt="Girassol Natural" class="card-image">
                        <h3 class="card-title">Girassol Natural</h3>
                        <p class="card-description">Essência viva que ilumina ambientes.</p>
                    </div>

                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1518837695005-2083093ee35b?w=300&h=300&fit=crop&crop=face" alt="Girassol Natural" class="card-image">
                        <h3 class="card-title">Girassol Natural</h3>
                        <p class="card-description">Essência viva que ilumina ambientes.</p>
                    </div>

                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1587300003388-59208cc962cb?w=300&h=300&fit=crop&crop=face" alt="Kit Chás" class="card-image">
                        <h3 class="card-title">Kit Chás</h3>
                        <p class="card-description">Sabor e saúde.</p>
                    </div>

                    <div class="card">
                        <img src="{{ asset('img/suco.jpg') }}" alt="Suco Natural" class="card-image">
                        <h3 class="card-title">Suco Natural</h3>
                        <p class="card-description">Refrescante e saudável.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-btn right-btn">❯</button>
        </div>
    </section>

    <!-- Novidades -->
    <section class="products-section">
        <h2 class="section-title">Suculentas</h2>
        <div class="carousel-wrapper">
            <button class="carousel-btn left-btn">❮</button>
            <div class="carousel-container">
                <div class="card-carousel">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=300&h=300&fit=crop&crop=face" alt="Planta Medicinal" class="card-image">
                        <h3 class="card-title">Planta Medicinal</h3>
                        <p class="card-description">Saúde e vitalidade.</p>
                    </div>

                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=300&h=300&fit=crop&crop=face" alt="Máscara Facial" class="card-image">
                        <h3 class="card-title">Máscara Facial</h3>
                        <p class="card-description">Beleza natural.</p>
                    </div>

                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=300&h=300&fit=crop&crop=face" alt="Creme Natural" class="card-image">
                        <h3 class="card-title">Creme Natural</h3>
                        <p class="card-description">Hidratação e cuidado.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-btn right-btn">❯</button>
        </div>
    </section>

    <!-- Categorias e Alfabeto -->
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
