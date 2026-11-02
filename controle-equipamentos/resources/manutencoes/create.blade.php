@extends('layouts.app')
@section('title', 'Nova Manutenção')
@section('content')
<div class="d-flex justify-content-between mb-4">
    <h1 class="h3">➕ Nova Manutenção</h1>
    <a href="{{ route('manutencoes.index') }}" class="btn btn-secondary">← Voltar</a>
</div>

<form action="{{ route('manutencoes.store') }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Equipamento *</label>
                    <select name="equipamento_id" class="form-select" required>
                        <option value="">Selecione...</option>
                        @foreach($equipamentos as $e)
                            <option value="{{ $e->id }}">{{ $e->patrimonio }} - {{ $e->modelo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Tipo *</label>
                    <select name="tipo" class="form-select" required>
                        <option value="Preventiva">Preventiva</option>
                        <option value="Corretiva">Corretiva</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Data *</label>
                    <input type="date" name="data_manutencao" class="form-control" required value="{{ date('Y-m-d') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Técnico *</label>
                    <input type="text" name="tecnico" class="form-control" required placeholder="Nome do técnico">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Custo (R$)</label>
                    <input type="number" name="custo" class="form-control" step="0.01" value="0">
                </div>
                <div class="col-12">
                    <label class="form-label">Descrição *</label>
                    <textarea name="descricao" class="form-control" rows="3" required placeholder="O que foi feito?"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">💾 Salvar Manutenção</button>
        </div>
    </div>
</form>
@endsection