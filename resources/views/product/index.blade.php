<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja - Natureza em Casa</title>
    <link rel="icon" href="img/Natureza-removebg-preview.png" type="image/png">
    <link rel="stylesheet" href="css/loja.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Merriweather:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="header-left">
            <div class="logo-wrapper">
                <img src="img/Natureza-removebg-preview.png" alt="Logo Natureza em Casa" class="logo">
            </div>
        </div>
        <div class="header-center">
            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Busque por plantas, remédios...">
                <button class="search-btn">🔍</button>
            </div>
        </div>
        <nav class="nav-links">
            <a href="index.html" class="nav-link">Categorias</a>
            <a href="#" class="nav-link">Ofertas</a>
            <a href="loja.html" class="nav-link">Vender</a>
            <a href="#" class="nav-link">Contato</a>
        </nav>
        <div class="header-buttons">
            <button class="header-btn">Crie a sua Conta</button>
            <button class="header-btn">Entrar</button>
            <!-- Carrinho no header -->
            <button class="header-btn cart-btn">🛒 0</button>
        </div>
    </header>

    <!-- Banner -->
    <section class="banner">
        <h1 class="banner-title">LOJA</h1>
    </section>

    <!-- Produtos em Destaque -->
    <section class="products-section">
        <h2 class="section-title">Produtos em Destaque</h2>
        <div class="carousel-wrapper">
            <button class="carousel-btn left-btn">❮</button>
            <div class="carousel-container">
                <div class="card-carousel">
                    <div class="card">
                        <img src="img/planta3.jpg" alt="Girassol Natural" class="card-image">
                        <h3 class="card-title">Girassol Natural</h3>
                        <p class="card-description">Essência viva que ilumina ambientes.</p>
                        <div class="price">R$ 29,90</div>
                        <div class="rating">★ ★ ★ ★ ☆</div>
                        <button class="add-cart-btn">🛒 Adicionar</button>
                    </div>
                    <div class="card">
                        <img src="img/planta2.jpg" alt="Girassol Natural" class="card-image">
                        <h3 class="card-title">Girassol Natural</h3>
                        <p class="card-description">Essência viva que ilumina ambientes.</p>
                        <div class="price">R$ 29,90</div>
                        <div class="rating">★ ★ ★ ★ ☆</div>
                        <button class="add-cart-btn">🛒 Adicionar</button>
                    </div>
                    <div class="card">
                        <img src="img/planta3.jpg" alt="Girassol em Vaso" class="card-image">
                        <h3 class="card-title">Girassol em Vaso</h3>
                        <p class="card-description">Decoração e serenidade.</p>
                        <div class="price">R$ 39,90</div>
                        <div class="rating">★ ★ ★ ☆ ☆</div>
                        <button class="add-cart-btn">🛒 Adicionar</button>
                    </div>
                    <div class="card">
                        <img src="img/planta4.jpg" alt="Girassol Medicinal" class="card-image">
                        <h3 class="card-title">Girassol Medicinal</h3>
                        <p class="card-description">Remédio natural para harmonizar.</p>
                        <div class="price">R$ 24,90</div>
                        <div class="rating">★ ★ ★ ★ ★</div>
                        <button class="add-cart-btn">🛒 Adicionar</button>
                    </div>
                    <div class="card">
                        <img src="img/planta2.jpg" alt="Girassol Decorativo" class="card-image">
                        <h3 class="card-title">Girassol Decorativo</h3>
                        <p class="card-description">Transforme espaços em oásis.</p>
                        <div class="price">R$ 34,90</div>
                        <div class="rating">★ ★ ★ ☆ ☆</div>
                        <button class="add-cart-btn">🛒 Adicionar</button>
                    </div>
                </div>
            </div>
            <button class="carousel-btn right-btn">❯</button>
        </div>
    </section>

    <!-- Promoções -->
    <section class="products-section">
        <h2 class="section-title">Promoções</h2>
        <div class="carousel-wrapper">
            <button class="carousel-btn left-btn">❮</button>
            <div class="carousel-container">
                <div class="card-carousel">
                    <div class="card">
                        <img src="img/planta4.jpg" alt="Óleo Essencial" class="card-image">
                        <h3 class="card-title">Óleo Essencial</h3>
                        <p class="card-description">Purificador natural.</p>
                        <div class="price">R$ 19,90</div>
                        <div class="rating">★ ★ ★ ★ ☆</div>
                        <button class="add-cart-btn">🛒 Adicionar</button>
                    </div>
                    <div class="card">
                        <img src="img/planta2.jpg" alt="Girassol Natural" class="card-image">
                        <h3 class="card-title">Girassol Natural</h3>
                        <p class="card-description">Essência viva que ilumina ambientes.</p>
                        <div class="price">R$ 29,90</div>
                        <div class="rating">★ ★ ★ ☆ ☆</div>
                        <button class="add-cart-btn">🛒 Adicionar</button>
                    </div>
                    <div class="card">
                        <img src="img/remedios.jpg" alt="Kit Chás" class="card-image">
                        <h3 class="card-title">Kit Chás</h3>
                        <p class="card-description">Sabor e saúde.</p>
                        <div class="price">R$ 49,90</div>
                        <div class="rating">★ ★ ★ ★ ☆</div>
                        <button class="add-cart-btn">🛒 Adicionar</button>
                    </div>
                    <div class="card">
                        <img src="img/dec.jpg" alt="Suco Natural" class="card-image">
                        <h3 class="card-title">Suco Natural</h3>
                        <p class="card-description">Refrescante e saudável.</p>
                        <div class="price">R$ 14,90</div>
                        <div class="rating">★ ★ ★ ☆ ☆</div>
                        <button class="add-cart-btn">🛒 Adicionar</button>
                    </div>
                </div>
            </div>
            <button class="carousel-btn right-btn">❯</button>
        </div>
    </section>

    <!-- Novidades -->
    <section class="products-section">
        <h2 class="section-title">Novidades</h2>
        <div class="carousel-wrapper">
            <button class="carousel-btn left-btn">❮</button>
            <div class="carousel-container">
                <div class="card-carousel">
                    <div class="card">
                        <img src="img/pant.jpg" alt="Planta Medicinal" class="card-image">
                        <h3 class="card-title">Planta Medicinal</h3>
                        <p class="card-description">Saúde e vitalidade.</p>
                        <div class="price">R$ 39,90</div>
                        <div class="rating">★ ★ ★ ★ ☆</div>
                        <button class="add-cart-btn">🛒 Adicionar</button>
                    </div>
                    <div class="card">
                        <img src="img/plantas.jpg" alt="Máscara Facial" class="card-image">
                        <h3 class="card-title">Máscara Facial</h3>
                        <p class="card-description">Beleza natural.</p>
                        <div class="price">R$ 29,90</div>
                        <div class="rating">★ ★ ★ ☆ ☆</div>
                        <button class="add-cart-btn">🛒 Adicionar</button>
                    </div>
                    <div class="card">
                        <img src="img/planta3.jpg" alt="Creme Natural" class="card-image">
                        <h3 class="card-title">Creme Natural</h3>
                        <p class="card-description">Hidratação e cuidado.</p>
                        <div class="price">R$ 34,90</div>
                        <div class="rating">★ ★ ★ ★ ☆</div>
                        <button class="add-cart-btn">🛒 Adicionar</button>
                    </div>
                    <div class="card">
                        <img src="img/erv.jpg" alt="Girassol Natural" class="card-image">
                        <h3 class="card-title">Girassol Natural</h3>
                        <p class="card-description">Essência viva que ilumina ambientes.</p>
                        <div class="price">R$ 29,90</div>
                        <div class="rating">★ ★ ★ ★ ☆</div>
                        <button class="add-cart-btn">🛒 Adicionar</button>
                    </div>
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
            <a href="#" class="alphabet-tag">A</a>
            <a href="#" class="alphabet-tag">B</a>
            <a href="#" class="alphabet-tag">C</a>
            <a href="#" class="alphabet-tag">D</a>
            <a href="#" class="alphabet-tag">E</a>
            <a href="#" class="alphabet-tag">F</a>
            <a href="#" class="alphabet-tag">G</a>
            <a href="#" class="alphabet-tag">H</a>
            <a href="#" class="alphabet-tag">I</a>
            <a href="#" class="alphabet-tag">J</a>
            <a href="#" class="alphabet-tag">K</a>
            <a href="#" class="alphabet-tag">L</a>
            <a href="#" class="alphabet-tag">M</a>
            <a href="#" class="alphabet-tag">N</a>
            <a href="#" class="alphabet-tag">O</a>
            <a href="#" class="alphabet-tag">P</a>
            <a href="#" class="alphabet-tag">Q</a>
            <a href="#" class="alphabet-tag">R</a>
            <a href="#" class="alphabet-tag">S</a>
            <a href="#" class="alphabet-tag">T</a>
            <a href="#" class="alphabet-tag">U</a>
            <a href="#" class="alphabet-tag">V</a>
            <a href="#" class="alphabet-tag">W</a>
            <a href="#" class="alphabet-tag">X</a>
            <a href="#" class="alphabet-tag">Y</a>
            <a href="#" class="alphabet-tag">Z</a>
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

    <script src="js/loja.js"></script>
</body>
</html>