<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Artigo</title>

    <link rel="icon" href="{{ asset('img/Natureza-removebg-preview.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    <style>
        .image-preview {
            width: 100%;
            max-height: 250px;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.15);
            margin-top: 10px;
        }

        .image-preview img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .center-btn {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }
    </style>
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

        <div class="header-right">
            <nav class="nav-links">
                <a href="{{ route('article.index') }}" class="nav-link">Artigos</a>
                <a href="{{ url('/planta') }}" class="nav-link">Enciclopédia</a>
                <a href="#" class="nav-link">Loja</a>
            </nav>
        </div>

        
    </header>

    {{-- MAIN --}}
    <main>
        <div class="main-bg"></div>

        <div class="container" style="display: flex; justify-content: center; margin-top: 40px;">

            <div class="card" style="width: 650px;">

                <h1 class="section-title" style="margin-bottom: 20px;">Editar Artigo</h1>

               <form action="{{ route('article.update', $article) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- TÍTULO --}}
                    <div class="form-group">
                        <label style="font-weight: 600; color: var(--green-dark);">Título:</label>
                        <input type="text" name="title"
                               class="search-input"
                               value="{{ $article->title }}"
                               style="border-radius: 12px; width: 100%; padding: 14px;">
                    </div>

                    {{-- AUTOR --}}
                    <div class="form-group">
                        <label style="font-weight: 600; color: var(--green-dark);">Autor:</label>
                        <input type="text" name="author"
                               class="search-input"
                               value="{{ $article->author }}"
                               style="border-radius: 12px; width: 100%; padding: 14px;">
                    </div>

                    {{-- DATA --}}
                    <div class="form-group">
                        <label style="font-weight: 600; color: var(--green-dark);">Data de Publicação:</label>
                        <input type="date" name="publication_date"
                               class="search-input"
                               value="{{ $article->publication_date }}"
                               style="border-radius: 12px; width: 100%; padding: 14px;">
                    </div>

                    {{-- DESCRIÇÃO --}}
                    <div class="form-group">
                        <label style="font-weight: 600; color: var(--green-dark);">Descrição:</label>
                        <textarea name="description" rows="6"
                            class="search-input"
                            style="border-radius: 12px; width: 100%; padding: 14px; resize: vertical;">{{ $article->description }}</textarea>
                    </div>

                    {{-- REFERÊNCIAS --}}
                    <div class="form-group">
                        <label style="font-weight: 600; color: var(--green-dark);">Referências Científicas:</label>
                        <textarea name="scientific_references" rows="4"
                            class="search-input"
                            style="border-radius: 12px; width: 100%; padding: 14px; resize: vertical;">{{ $article->scientific_references }}</textarea>
                    </div>

                    {{-- IMAGEM --}}
                    <div class="form-group">
                        <label style="font-weight: 600; color: var(--green-dark);">Imagem:</label>
                        <input type="file" name="image" accept="image/*"
                               class="search-input"
                               style="padding: 12px; border-radius: 12px;">

                        @if($article->image)
                            <p style="margin-top: 10px; font-weight: 600;">Prévia atual:</p>
                            <div class="image-preview">
                                <img src="{{ asset('storage/' . $article->image) }}" alt="Imagem atual">
                            </div>
                        @endif
                    </div>

                    {{-- BOTÃO ATUALIZAR CENTRALIZADO --}}
                    <div class="center-btn">
                        <button type="submit"
                            style="
                                padding: 14px 25px;
                                border: none;
                                border-radius: 10px;
                                background: var(--green-mid);
                                color: #fff;
                                font-weight: 600;
                                cursor: pointer;
                                transition: 0.3s;
                            ">
                            Atualizar Artigo
                        </button>
                    </div>

                    {{-- BOTÃO VOLTAR --}}
                    <div style="display: flex; justify-content: center; margin: 20px 0;">
                        <a href="{{ route('article.index') }}" 
                           style="font-size: 40px; color: black; text-decoration: none; padding: 5px 15px;">
                            ←
                        </a>
                    </div>

                </form>

            </div>

        </div>
    </main>

    {{-- FOOTER --}}
    <footer class="footer">
        <p class="footer-text">© 2025 Natureza em Casa. Todos os direitos reservados.</p>

        <div class="social-icons">
            <a href="#" class="social-link"><span>🌐</span></a>
            <a href="#" class="social-link"><span>🐦</span></a>
            <a href="#" class="social-link"><span>📸</span></a>
            <a href="#" class="social-link"><span>💼</span></a>
        </div>
    </footer>

</body>
</html>
