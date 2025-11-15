<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Planta</title>

    <link rel="icon" href="{{ asset('img/Natureza-removebg-preview.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>

    {{-- HEADER IGUAL AO DA HOME --}}
    <header class="header">
        <div class="header-left">
            <div class="logo-wrapper">
                <img src="{{ asset('img/Natureza-removebg-preview.png') }}" alt="Logo Natureza em Casa" class="logo">
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
                <a href="#" class="nav-link">Loja</a>
            </nav>
        </div>

        <div class="header-buttons">
            <button class="header-btn">Login</button>
        </div>
    </header>

    {{-- MAIN IGUAL AO CREATE --}}
    <main>
        <div class="main-bg"></div>
        <div class="container" style="display: flex; justify-content: center; margin-top: 40px;">

            {{-- CARD CENTRAL --}}
            <div class="card" style="width: 600px;">

                <h1 class="section-title" style="margin-bottom: 20px;">Editar Planta</h1>

                <form action="{{ route('planta.update', $planta->id) }}" method="POST"
                      style="display: flex; flex-direction: column; gap: 20px;">
                    @csrf
                    @method('PUT')

                    {{-- NOME --}}
                    <div>
                        <label style="font-weight: 600; color: var(--green-dark);">Nome:</label>
                        <input type="text" name="nome"
                            class="search-input"
                            value="{{ $planta->nome }}"
                            style="border-radius: 12px; width: 100%; padding: 14px;">
                    </div>

                    {{-- TIPO --}}
                    <div>
                        <label style="font-weight: 600; color: var(--green-dark);">Tipo:</label>
                        <input type="text" name="tipo"
                            class="search-input"
                            value="{{ $planta->tipo }}"
                            style="border-radius: 12px; width: 100%; padding: 14px;">
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
                            ">{{ $planta->descricao }}</textarea>
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
                        Atualizar
                    </button>

                        <div style="display: flex; justify-content: center; margin: 20px 0;">
                         <a href="{{ route('planta.index') }}" 
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
