<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar - Controle de Equipamentos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
            padding: 20px;
        }
        .register-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 450px;
        }
    </style>
</head>
<body>
    <div class="register-card">
        <div class="text-center mb-4">
            <div style="font-size: 3.5em; margin-bottom: 10px;">🏫</div>
            <h3 class="fw-bold text-dark">Criar Conta</h3>
            <p class="text-muted">Cadastre-se para começar a usar o sistema</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Nome Completo</label>
                <input id="name" type="text" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus placeholder="Seu nome">
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-bold">E-mail</label>
                <input id="email" type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" required placeholder="seu@email.com">
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-bold">Senha</label>
                <input id="password" type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" required placeholder="Mínimo de 8 caracteres">
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label fw-bold">Confirmar Senha</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control form-control-lg" required placeholder="Repita a senha">
            </div>

            <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                ✅ Criar Minha Conta
            </button>

            <div class="text-center">
                <span class="text-muted">Já tem uma conta?</span>
                <a href="{{ route('login') }}" class="text-decoration-none fw-bold text-primary">Faça login</a>
            </div>
        </form>
    </div>
</body>
</html>