@extends('layouts.app')
@section('title', 'Manutenções')
@section('content')
<div class="d-flex justify-content-between mb-4">
    <h1 class="h3">🔧 Manutenções</h1>
    <a href="{{ route('manutencoes.create') }}" class="btn btn-primary">➕ Nova Manutenção</a>
</div>

<div class="card">
    <table class="table table-hover mb-0">
        <thead class="table-dark">
            <tr>
                <th>Data</th>
                <th>Equipamento</th>
                <th>Tipo</th>
                <th>Técnico</th>
                <th>Custo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($manutencoes as $m)
            <tr>
                <td>{{ \Carbon\Carbon::parse($m->data_manutencao)->format('d/m/Y') }}</td>
                <td>{{ $m->equipamento->patrimonio }} ({{ $m->equipamento->modelo }})</td>
                <td><span class="badge bg-secondary">{{ $m->tipo }}</span></td>
                <td>{{ $m->tecnico }}</td>
                <td>R$ {{ number_format($m->custo, 2, ',', '.') }}</td>
                <td>
                    <form action="{{ route('manutencoes.destroy', $m) }}" method="POST" class="d-inline" onsubmit="return confirm('Excluir esta manutenção?')">
                        @csrf 
                        @method('DELETE') 
                        <button class="btn btn-sm btn-danger">🗑️</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-4 text-muted">Nenhuma manutenção registrada.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection