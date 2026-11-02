<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Controle de Equipamentos')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="d-flex">
        <nav class="sidebar">
            <div class="text-center mb-4"><div style="font-size: 2.5em;">🏫</div><h5 class="text-white mb-0">Controle</h5></div>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">📊 Dashboard</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('equipamentos.*') ? 'active' : '' }}" href="{{ route('equipamentos.index') }}">💻 Equipamentos</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('manutencoes.*') ? 'active' : '' }}" href="{{ route('manutencoes.index') }}">🔧 Manutenções</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('agendamentos.*') ? 'active' : '' }}" href="{{ route('agendamentos.index') }}">📅 Agendamentos</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('emprestimos.*') ? 'active' : '' }}" href="{{ route('emprestimos.index') }}">🤝 Empréstimos</a></li>
            </ul>
            <hr class="text-secondary">
            <div class="mt-3">
                <div class="text-white mb-2"><small>Logado:</small><br><strong>{{ Auth::user()->name }}</strong></div>
                <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="btn btn-sm btn-outline-light w-100">🚪 Sair</button></form>
            </div>
        </nav>
        <main class="flex-grow-1 p-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>