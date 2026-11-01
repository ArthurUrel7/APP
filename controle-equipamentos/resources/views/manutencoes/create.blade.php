@extends('layouts.app')
@section('title', 'Nova Manutenção')
@section('content')
<h1 class="h3 mb-4">➕ Nova Manutenção</h1>
<form action="{{ route('manutencoes.store') }}" method="POST">
    @csrf
    <div class="card"><div class="card-body"><div class="row g-3">
        <div class="col-md-6"><label>Equipamento *</label><select name="equipamento_id" class="form-select" required><option value="">Selecione...</option>@foreach($equipamentos as $e)<option value="{{ $e->id }}">{{ $e->patrimonio }} - {{ $e->modelo }}</option>@endforeach</select></div>
        <div class="col-md-3"><label>Tipo *</label><select name="tipo" class="form-select" required><option value="Preventiva">Preventiva</option><option value="Corretiva">Corretiva</option></select></div>
        <div class="col-md-3"><label>Data *</label><input type="date" name="data_manutencao" class="form-control" required value="{{ date('Y-m-d') }}"></div>
        <div class="col-md-6"><label>Técnico *</label><input type="text" name="tecnico" class="form-control" required></div>
        <div class="col-md-6"><label>Custo (R$)</label><input type="number" name="custo" class="form-control" step="0.01" value="0"></div>
        <div class="col-12"><label>Descrição *</label><textarea name="descricao" class="form-control" rows="3" required></textarea></div>
    </div><button type="submit" class="btn btn-primary mt-4">💾 Salvar</button></div></div>
</form>
@endsection