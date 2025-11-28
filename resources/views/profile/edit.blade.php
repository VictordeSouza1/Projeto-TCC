    {{-- Importa CSS e JS via Vite --}}
    @vite(['resources/css/app.css', 'resources/css/profile.css', 'resources/js/app.js'])

    {{-- Header --}}
    <header class="header" style="margin-bottom: 1.5rem;">
        <div class="logo-wrapper">
            <a href="{{ route('index') }}">
                <img src="{{ asset('img/Natureza-removebg-preview.png') }}" alt="Logo" class="logo">
            </a>
            <h1 style="color:var(--white); font-family:'Merriweather', serif; font-size:1.1rem;">Natureza em Casa</h1>
        </div>

        <div class="header-buttons">
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="header-btn logout-btn">Sair da Conta</button>
            </form>
        </div>
    </header>

    {{-- Conteúdo principal --}}
    <main class="profile-container">
        {{-- Sidebar --}}
        <aside class="sidebar">

            <h2 style="margin-top:1rem;">{{ Auth::user()->name ?? 'Sem Nome' }}</h2>
            <p class="bio">“Cuidar do corpo é respeitar a natureza em nós.” 🍃</p>

            <div style="margin-top:1rem;">
                <a href="#" class="form-btn" style="display:block; margin-bottom:0.6rem;">Meu Perfil</a>
                <a href="{{ route('product.index') }}" class="form-btn" style="display:block;">Ir para Loja</a>
            </div>
        </aside>

        {{-- Main Content --}}
        <section class="main-content">
            {{-- Quick actions --}}
            <div class="quick-actions">
                <a href="/article" class="action-card">
                    <div class="icon">📚</div>
                    <div class="details">
                        <h3>Artigos</h3>
                    </div>
                </a>

                <a href="/planta" class="action-card">
                    <div class="icon">🌿</div>
                    <div class="details">
                        <h3>Plantas</h3>
                    </div>
                </a>

                <a href="{{ route('cart.index') }}" class="action-card">
                    <div class="icon">🛒</div>
                    <div class="details">
                        <h3>Carrinho</h3>
                        <p>{{ array_sum(array_column(session('cart', []), 'quantidade')) }} itens</p>
                    </div>
                </a>
            </div>

            {{-- Formulários Breeze encapsulados nos cards --}}
            <div class="info-section">
                <h3 style="margin-bottom:1rem; font-family:'Merriweather', serif; color:var(--green-dark);">Informações do Perfil</h3>
                @if (session('status'))
                    <div style="margin-bottom:1rem; padding:0.75rem; background:#e6ffed; border-radius:8px; color: #06532a;">
                        {{ session('status') }}
                    </div>
                @endif
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="info-section">
                <h3 style="margin-bottom:1rem; font-family:'Merriweather', serif; color:var(--green-dark);">Segurança</h3>
                @include('profile.partials.update-password-form')
            </div>
        </section>
    </main>

    <footer class="footer">
        <p>© 2025 Natureza em Casa — Cuidando da sua saúde de forma natural.</p>
    </footer>
