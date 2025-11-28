<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Produto</title>

    <link rel="icon" href="{{ asset('img/Natureza-removebg-preview.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>

    {{-- HEADER IGUAL AO DA HOME --}}
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
                <a href="#" class="nav-link">Artigos</a>
                <a href="{{ url('/planta') }}" class="nav-link">Enciclopédia</a>
                <a href="{{ url('/product') }}" class="nav-link">Loja</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="main-bg"></div>

        <div class="container" style="display: flex; justify-content: center; margin-top: 40px;">

            {{-- CARD CENTRAL --}}
            <div class="card" style="width: 600px;">

                <h1 class="section-title" style="margin-bottom: 20px;">Editar Produto</h1>

                <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data"
                      style="display: flex; flex-direction: column; gap: 20px;">
                    @csrf
                    @method('PUT')

                    {{-- NOME --}}
                    <div>
                        <label style="font-weight: 600; color: var(--green-dark);">Nome:</label>
                        <input type="text" name="nome"
                               class="search-input"
                               value="{{ old('nome', $product->name) }}"
                               style="border-radius: 12px; width: 100%; padding: 14px;">
                    </div>

                    {{-- PREÇO --}}
                    <div>
                        <label style="font-weight: 600; color: var(--green-dark);">Preço:</label>
                        <input type="number" step="0.01" name="preco"
                               class="search-input"
                               value="{{ old('preco', $product->price) }}"
                               style="border-radius: 12px; width: 100%; padding: 14px;">
                    </div>

                    {{-- IMAGEM --}}
                    <div>
                        <label style="font-weight: 600; color: var(--green-dark);">Imagem:</label>
                        @if($product->image)
                            <div style="margin-bottom: 10px;">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Imagem atual" style="max-width: 150px;">
                            </div>
                        @endif
                        <input type="file" name="imagem" style="padding: 10px;">
                        <small style="color: gray;">Deixe em branco para manter a imagem atual.</small>
                    </div>

                    {{-- DESCRIÇÃO --}}
                    <div>
                        <label style="font-weight: 600; color: var(--green-dark);">Descrição:</label>
                        <textarea name="descricao"
                                  class="search-input"
                                  rows="6"
                                  style="
                                      border-radius: 12px;
                                      width: 100%;
                                      padding: 14px;
                                      resize: vertical;
                                      font-family: 'Inter', sans-serif;
                                  ">{{ old('descricao', $product->description) }}</textarea>
                    </div>

                    {{-- BOTÃO SALVAR --}}
                    <button type="submit"
                        style="
                            padding: 14px;
                            border: none;
                            border-radius: 10px;
                            background: var(--green-mid);
                            color: #fff;
                            font-weight: 600;
                            cursor: pointer;
                            transition: 0.3s;
                        ">
                        Atualizar Produto
                    </button>

                    <a href="{{ route('product.index') }}"
                       style="text-align: center; margin-top: 10px; color: var(--green-dark); font-weight: 600;">
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

</body>
</html>
