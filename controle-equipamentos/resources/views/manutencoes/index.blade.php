@extends('layouts.app')
@section('title', 'Manutenções')
@section('content')
<div class="d-flex justify-content-between mb-4"><h1 class="h3">🔧 Manutenções</h1><a href="{{ route('manutencoes.create') }}" class="btn btn-primary">➕ Nova</a></div>
<div class="card"><table class="table table-hover mb-0">
    <thead class="table-dark"><tr><th>Data</th><th>Equipamento</th><th>Tipo</th><th>Técnico</th><th>Custo</th></tr></thead>
    <tbody>
        @forelse($manutencoes as $m)
        <tr>
            <td>{{ \Carbon\Carbon::parse($m->data_manutencao)->format('d/m/Y') }}</td>
            <td>{{ $m->equipamento->patrimonio }}</td>
            <td>{{ $m->tipo }}</td>
            <td>{{ $m->tecnico }}</td>
            <td>R$ {{ number_format($m->custo, 2, ',', '.') }}</td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center py-4">Nenhuma manutenção.</td></tr>
        @endforelse
    </tbody>
</table></div>
@endsection