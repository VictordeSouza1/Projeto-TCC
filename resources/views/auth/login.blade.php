    @vite(['resources/css/app.css', 'resources/css/profile.css'])

    <div class="login-container">

        <!-- LOGO -->
        <div class="login-logo">
            <img src="{{ asset('img/Natureza-removebg-preview.png') }}" alt="Natureza em Casa">
        </div>

        <!-- STATUS -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- CARD -->
        <div class="login-card">

            <h2 class="login-title">Entrar na Conta</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autofocus
                           class="input-field">
                    <x-input-error :messages="$errors->get('email')" class="error" />
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input id="password"
                           type="password"
                           name="password"
                           required
                           class="input-field">
                    <x-input-error :messages="$errors->get('password')" class="error" />
                </div>

                <!-- Remember -->
                <label class="remember">
                    <input type="checkbox" name="remember">
                    <span>Lembrar de mim</span>
                </label>

                <!-- Actions -->
                <div class="login-actions">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-btn">
                            Esqueceu a senha?
                        </a>
                    @endif

                    <button class="login-btn" type="submit">
                        Entrar
                    </button>
                </div>
            </form>

            <p class="register-text">
                Ainda não tem conta?
                <a href="{{ route('register') }}">Criar conta</a>
            </p>

        </div>
    </div>


