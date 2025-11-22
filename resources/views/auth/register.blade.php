    @vite(['resources/css/app.css', 'resources/css/profile.css'])

    <div class="login-container">

        <!-- LOGO -->
        <div class="login-logo">
            <img src="{{ asset('img/Natureza-removebg-preview.png') }}" alt="Natureza em Casa">
        </div>

        <!-- CARD -->
        <div class="login-card">

            <h2 class="login-title">Criar Conta</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nome -->
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input id="name"
                           type="text"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           autofocus
                           class="input-field">
                    <x-input-error :messages="$errors->get('name')" class="error" />
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           class="input-field">
                    <x-input-error :messages="$errors->get('email')" class="error" />
                </div>

                <!-- Senha -->
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input id="password"
                           type="password"
                           name="password"
                           required
                           class="input-field">
                    <x-input-error :messages="$errors->get('password')" class="error" />
                </div>

                <!-- Confirmar Senha -->
                <div class="form-group">
                    <label for="password_confirmation">Confirmar Senha</label>
                    <input id="password_confirmation"
                           type="password"
                           name="password_confirmation"
                           required
                           class="input-field">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="error" />
                </div>

                <!-- Botão -->
                <button class="login-btn" type="submit">
                    Criar conta
                </button>

                <!-- Link para login -->
                <p class="register-text">
                    Já tem uma conta?
                    <a href="{{ route('login') }}">Entrar</a>
                </p>

            </form>

        </div>

    </div>
