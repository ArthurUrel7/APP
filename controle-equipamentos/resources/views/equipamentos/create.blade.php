@extends('layouts.app')
@section('title', 'Novo Equipamento')
@section('content')
<h1 class="h3 mb-4">➕ Novo Equipamento</h1>
<form action="{{ route('equipamentos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card"><div class="card-body"><div class="row g-3">
        <div class="col-md-4"><label>Patrimônio *</label><input type="text" name="patrimonio" class="form-control" required></div>
        <div class="col-md-4"><label>Tipo *</label><select name="tipo" class="form-select" required><option value="Computador">Computador</option><option value="Notebook">Notebook</option><option value="Tablet">Tablet</option></select></div>
        <div class="col-md-4"><label>Local *</label><input type="text" name="local" class="form-control" required></div>
        <div class="col-md-4"><label>Marca *</label><input type="text" name="marca" class="form-control" required></div>
        <div class="col-md-4"><label>Modelo *</label><input type="text" name="modelo" class="form-control" required></div>
        <div class="col-md-4"><label>Status *</label><select name="status" class="form-select" required><option value="Disponível">Disponível</option><option value="Em uso">Em uso</option><option value="Manutenção">Manutenção</option></select></div>
        <div class="col-12"><label>Foto do Equipamento</label><input type="file" name="foto" class="form-control" accept="image/*"></div>
    </div><button type="submit" class="btn btn-primary mt-4">💾 Salvar</button></div></div>
</form>
@endsection