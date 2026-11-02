@extends('layouts.app')
@section('title', 'Empréstimos')
@section('content')
<div class="d-flex justify-content-between mb-4"><h1 class="h3">🤝 Empréstimos</h1><a href="{{ route('emprestimos.create') }}" class="btn btn-primary">➕ Novo</a></div>
<div class="card"><table class="table table-hover mb-0">
    <thead class="table-dark"><tr><th>Equipamento</th><th>Solicitante</th><th>Retirada</th><th>Devolução</th><th>Status</th><th>Ações</th></tr></thead>
    <tbody>
        @forelse($emprestimos as $emp)
        <tr>
            <td>{{ $emp->equipamento->patrimonio }}</td>
            <td>{{ $emp->solicitante }}</td>
            <td>{{ \Carbon\Carbon::parse($emp->data_retirada)->format('d/m/Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($emp->data_devolucao)->format('d/m/Y') }}</td>
            <td><span class="badge bg-{{ $emp->status == 'Ativo' ? 'warning' : 'success' }}">{{ $emp->status }}</span></td>
            <td>
                @if($emp->status == 'Ativo')
                    <form action="{{ route('emprestimos.devolver', $emp) }}" method="POST" class="d-inline">@csrf @method('PATCH') <button class="btn btn-sm btn-success">✅ Devolver</button></form>
                @endif
                <form action="{{ route('emprestimos.destroy', $emp) }}" method="POST" class="d-inline" onsubmit="return confirm('Excluir?')">@csrf @method('DELETE') <button class="btn btn-sm btn-danger">🗑️</button></form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center py-4">Nenhum empréstimo.</td></tr>
        @endforelse
    </tbody>
</table></div>
@endsection