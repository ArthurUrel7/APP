@extends('layouts.app')

@section('title', 'Equipamentos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">💻 Equipamentos</h1>
    
    <div class="d-flex gap-2">
        <!-- Botão do Relatório PDF -->
        <a href="{{ route('relatorios.inventario') }}" class="btn btn-danger">📄 Gerar PDF</a>
        
        <!-- Botão de Novo Equipamento -->
        <a href="{{ route('equipamentos.create') }}" class="btn btn-primary">
            ➕ Novo Equipamento
        </a>
    </div>
</div>

<div class="card">
    <table class="table table-hover mb-0">
        <thead class="table-dark">
            <tr>
                <th>Foto</th>
                <th>Patrimônio</th>
                <th>Tipo</th>
                <th>Marca/Modelo</th>
                <th>Local</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($equipamentos as $equip)
            <tr>
                <td>
                    @if($equip->foto)
                        <img src="{{ asset('storage/'.$equip->foto) }}" style="width:40px; height:40px; border-radius:5px; object-fit:cover;">
                    @else
                        <span style="font-size: 1.5em;">📦</span>
                    @endif
                </td>
                <td><strong>{{ $equip->patrimonio }}</strong></td>
                <td>{{ $equip->tipo }}</td>
                <td>{{ $equip->marca }} {{ $equip->modelo }}</td>
                <td>{{ $equip->local }}</td>
                <td>
                    <span class="badge bg-{{ $equip->status == 'Disponível' ? 'success' : ($equip->status == 'Manutenção' ? 'warning' : 'info') }}">
                        {{ $equip->status }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('equipamentos.edit', $equip) }}" class="btn btn-sm btn-warning">✏️</a>
                    
                    <form action="{{ route('equipamentos.destroy', $equip) }}" method="POST" class="d-inline" onsubmit="return confirm('Excluir este equipamento?')">
                        @csrf 
                        @method('DELETE') 
                        <button class="btn btn-sm btn-danger">🗑️</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center py-4 text-muted">
                    Nenhum equipamento cadastrado.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection