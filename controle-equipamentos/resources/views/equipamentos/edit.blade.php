@extends('layouts.app')
@section('title', 'Editar Equipamento')
@section('content')
<h1 class="h3 mb-4">✏️ Editar Equipamento</h1>
<form action="{{ route('equipamentos.update', $equipamento) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="card"><div class="card-body"><div class="row g-3">
        <div class="col-md-4"><label>Patrimônio *</label><input type="text" name="patrimonio" class="form-control" value="{{ $equipamento->patrimonio }}" required></div>
        <div class="col-md-4"><label>Tipo *</label><select name="tipo" class="form-select" required><option value="Computador" {{ $equipamento->tipo == 'Computador' ? 'selected' : '' }}>Computador</option><option value="Notebook" {{ $equipamento->tipo == 'Notebook' ? 'selected' : '' }}>Notebook</option><option value="Tablet" {{ $equipamento->tipo == 'Tablet' ? 'selected' : '' }}>Tablet</option></select></div>
        <div class="col-md-4"><label>Local *</label><input type="text" name="local" class="form-control" value="{{ $equipamento->local }}" required></div>
        <div class="col-md-4"><label>Marca *</label><input type="text" name="marca" class="form-control" value="{{ $equipamento->marca }}" required></div>
        <div class="col-md-4"><label>Modelo *</label><input type="text" name="modelo" class="form-control" value="{{ $equipamento->modelo }}" required></div>
        <div class="col-md-4"><label>Status *</label><select name="status" class="form-select" required><option value="Disponível" {{ $equipamento->status == 'Disponível' ? 'selected' : '' }}>Disponível</option><option value="Em uso" {{ $equipamento->status == 'Em uso' ? 'selected' : '' }}>Em uso</option><option value="Manutenção" {{ $equipamento->status == 'Manutenção' ? 'selected' : '' }}>Manutenção</option></select></div>
        <div class="col-md-6"><label>Nova Foto (opcional)</label><input type="file" name="foto" class="form-control" accept="image/*"></div>
        <div class="col-md-6 d-flex align-items-end">
            @if($equipamento->foto)
                <img src="{{ asset('storage/'.$equipamento->foto) }}" style="height: 50px; border-radius: 5px;">
                <span class="ms-2 text-muted">Foto atual</span>
            @endif
        </div>
    </div><button type="submit" class="btn btn-primary mt-4">💾 Atualizar</button></div></div>
</form>
@endsection