<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Novo Artigo</title>

    <link rel="icon" href="{{ asset('img/Natureza-removebg-preview.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>

    {{-- HEADER --}}
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
                <input type="text" placeholder="Buscar..." class="search-input">
                <button class="search-btn">🔍</button>
            </div>
        </div>

        <nav class="nav-links">
            <a href="{{ route('article.index') }}" class="nav-link">Artigos</a>
            <a href="{{ url('/planta') }}" class="nav-link">Enciclopédia</a>
            <a href="{{ url('/product') }}" class="nav-link">Loja</a>
        </nav>

        <div class="header-buttons">
            <button class="header-btn">Login</button>
        </div>
    </header>

    <main>
        <div class="main-bg"></div>

        <div class="container" style="display: flex; justify-content: center; margin-top: 40px;">

            <div class="card" style="width: 650px;">

                <h1 class="section-title" style="margin-bottom: 20px;">Novo Artigo</h1>

                {{-- FORMULÁRIO --}}
                <form action="{{ route('article.store') }}" 
                      method="POST"
                      enctype="multipart/form-data"
                      style="display: flex; flex-direction: column; gap: 20px;">

                    @csrf

                    {{-- TÍTULO --}}
                    <div>
                        <label style="font-weight: 600; color: var(--green-dark);">Título:</label>
                        <input type="text" name="title" class="search-input"
                            style="border-radius: 12px; width: 100%; padding: 14px;" required>
                    </div>

                    {{-- AUTOR --}}
                    <div>
                        <label style="font-weight: 600; color: var(--green-dark);">Autor:</label>
                        <input type="text" name="author" class="search-input"
                            style="border-radius: 12px; width: 100%; padding: 14px;" required>
                    </div>

                    {{-- DATA --}}
                    <div>
                        <label style="font-weight: 600; color: var(--green-dark);">Data de Publicação:</label>
                        <input type="date" name="publication_date" class="search-input"
                            style="border-radius: 12px; width: 100%; padding: 14px;" required>
                    </div>

                    {{-- IMAGEM --}}
                    <div>
                        <label style="font-weight: 600; color: var(--green-dark);">Imagem do Artigo:</label>
                        <input type="file" name="image" accept="image/*"
                               class="search-input"
                               style="border-radius: 12px; width: 100%; padding: 14px;">

                        {{-- Pré-visualização --}}
                        <img id="preview"
                             style="width: 100%; margin-top: 10px; border-radius: 14px; display: none;">
                    </div>

                    {{-- DESCRIÇÃO --}}
                    <div>
                        <label style="font-weight: 600; color: var(--green-dark);">Descrição:</label>
                        <textarea name="description" rows="6"
                            class="search-input"
                            style="border-radius: 12px; width: 100%; padding: 14px; resize: vertical;"></textarea>
                    </div>

                    {{-- REFERÊNCIAS --}}
                    <div>
                        <label style="font-weight: 600; color: var(--green-dark);">Referências Científicas:</label>
                        <textarea name="scientific_references" rows="4"
                            class="search-input"
                            style="border-radius: 12px; width: 100%; padding: 14px; resize: vertical;"></textarea>
                    </div>

                    {{-- BOTÃO --}}
                    <button type="submit"
                        style="padding: 14px; border: none; border-radius: 10px;
                               background: var(--green-mid); color: #fff;
                               font-weight: 600; cursor: pointer; transition: 0.3s;">
                        Publicar Artigo
                    </button>

                    <a href="{{ route('article.index') }}"
                        style="text-align: center; color: var(--green-dark); font-weight: 600;">
                        Voltar
                    </a>

                </form>

            </div>

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

    {{-- JS PRÉ-VISUALIZAÇÃO --}}
    <script>
        document.querySelector("input[name='image']").addEventListener("change", function(event) {
            const preview = document.getElementById("preview");
            const file = event.target.files[0];

            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = "block";
            }
        });
    </script>

</body>
</html>
