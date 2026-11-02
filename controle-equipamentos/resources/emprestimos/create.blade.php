@extends('layouts.app')
@section('title', 'Novo Empréstimo')
@section('content')
<h1 class="h3 mb-4">➕ Novo Empréstimo</h1>
<form action="{{ route('emprestimos.store') }}" method="POST">
    @csrf
    <div class="card"><div class="card-body"><div class="row g-3">
        <div class="col-md-6"><label>Equipamento (Disponíveis) *</label><select name="equipamento_id" class="form-select" required><option value="">Selecione...</option>@foreach($equipamentos as $e)<option value="{{ $e->id }}">{{ $e->patrimonio }} - {{ $e->modelo }}</option>@endforeach</select></div>
        <div class="col-md-6"><label>Solicitante *</label><input type="text" name="solicitante" class="form-control" required></div>
        <div class="col-md-6"><label>Data Retirada *</label><input type="date" name="data_retirada" class="form-control" required value="{{ date('Y-m-d') }}"></div>
        <div class="col-md-6"><label>Data Devolução *</label><input type="date" name="data_devolucao" class="form-control" required value="{{ date('Y-m-d', strtotime('+7 days')) }}"></div>
    </div><button type="submit" class="btn btn-primary mt-4">💾 Registrar</button></div></div>
</form>
@endsection