<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Controle de Equipamentos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .login-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 420px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="text-center mb-4">
            <div style="font-size: 3.5em; margin-bottom: 10px;">🏫</div>
            <h3 class="fw-bold text-dark">Controle de Equipamentos</h3>
            <p class="text-muted">Faça login para acessar o sistema</p>
        </div>

        <!-- Sessão Status (ex: senha resetada) -->
        @if (session('status'))
            <div class="alert alert-success mb-3">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label fw-bold">E-mail</label>
                <input id="email" type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus placeholder="seu@email.com">
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-bold">Senha</label>
                <input id="password" type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" required placeholder="••••••••">
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label text-muted" for="remember">Lembrar de mim</label>
                </div>
                @if (Route::has('password.request'))
                    <a class="text-decoration-none text-primary fw-bold" href="{{ route('password.request') }}">
                        Esqueceu a senha?
                    </a>
                @endif
            </div>

            <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                🚀 Entrar no Sistema
            </button>

            <div class="text-center">
                <span class="text-muted">Não tem uma conta?</span>
                <a href="{{ route('register') }}" class="text-decoration-none fw-bold text-primary">Registre-se aqui</a>
            </div>
        </form>
    </div>
</body>
</html>