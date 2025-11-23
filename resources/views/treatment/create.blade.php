<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Novo Tratamento</title>

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

        <div class="header-right">
            <nav class="nav-links">
                <a href="#" class="nav-link">Artigos</a>
                <a href="{{ url('/planta') }}" class="nav-link">Enciclopédia</a>
                <a href="{{ url('/product') }}" class="nav-link">Loja</a>
            </nav>
        </div>

        <div class="header-buttons">
            <button class="header-btn">Login</button>
        </div>
    </header>

    {{-- MAIN --}}
    <main>
        <div class="main-bg"></div>

        <div class="container" style="display: flex; justify-content: center; margin-top: 40px;">

            <div class="card" style="width: 650px;">

                <h1 class="section-title" style="margin-bottom: 20px;">Novo Tratamento</h1>

                <form action="{{ route('treatment.store') }}" method="POST"
                      style="display: flex; flex-direction: column; gap: 20px;">
                    @csrf

                    {{-- SELEÇÃO DE PLANTA --}}
                    <div>
                        <label style="font-weight: 600; color: var(--green-dark);">Planta:</label>
                        <select name="plant_id" 
                                class="search-input" 
                                style="border-radius: 12px; width: 100%; padding: 14px;">
                            <option value="">Selecione...</option>
                            @foreach($plantas as $planta)
                                <option value="{{ $planta->id }}">{{ $planta->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- NOME DO TRATAMENTO --}}
                    <div>
                        <label style="font-weight: 600; color: var(--green-dark);">Nome do Tratamento:</label>
                        <input type="text" name="nome"
                               class="search-input"
                               style="border-radius: 12px; width: 100%; padding: 14px;">
                    </div>

                    {{-- DESCRIÇÃO --}}
                    <div>
                        <label style="font-weight: 600; color: var(--green-dark);">Descrição:</label>
                        <textarea name="descricao"
                                  rows="5"
                                  class="search-input"
                                  style="border-radius: 12px; width: 100%; padding: 14px; resize: vertical;"></textarea>
                    </div>

                    {{-- MODO DE PREPARO --}}
                    <div>
                        <label style="font-weight: 600; color: var(--green-dark);">Modo de Preparo:</label>
                        <textarea name="modo_preparo"
                                  rows="5"
                                  class="search-input"
                                  style="border-radius: 12px; width: 100%; padding: 14px; resize: vertical;"></textarea>
                    </div>

                    {{-- OBSERVAÇÕES --}}
                    <div>
                        <label style="font-weight: 600; color: var(--green-dark);">Observações:</label>
                        <textarea name="observacoes"
                                  rows="4"
                                  class="search-input"
                                  style="border-radius: 12px; width: 100%; padding: 14px; resize: vertical;"></textarea>
                    </div>

                    {{-- BOTÃO --}}
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
                        Salvar Tratamento
                    </button>

                    <a href="{{ route('treatment.index') }}"
                       style="text-align: center; margin-top: 10px; color: var(--green-dark); font-weight: 600;">
                        Voltar
                    </a>

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
