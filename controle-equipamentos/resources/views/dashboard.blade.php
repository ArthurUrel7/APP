@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<h1 class="h3 mb-4">📊 Dashboard</h1>

<div class="row g-3 mb-4">
    <div class="col-md-3"><div class="card bg-primary text-white"><div class="card-body"><h6>Total</h6><h2>{{ $stats['total'] }}</h2></div></div></div>
    <div class="col-md-3"><div class="card bg-info text-white"><div class="card-body"><h6>💻 Computadores</h6><h2>{{ $stats['computadores'] }}</h2></div></div></div>
    <div class="col-md-3"><div class="card bg-success text-white"><div class="card-body"><h6>📓 Notebooks</h6><h2>{{ $stats['notebooks'] }}</h2></div></div></div>
    <div class="col-md-3"><div class="card bg-warning text-white"><div class="card-body"><h6>📱 Tablets</h6><h2>{{ $stats['tablets'] }}</h2></div></div></div>
</div>

<div class="row g-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Equipamentos por Tipo</h5>
                <canvas id="graficoTipos"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('graficoTipos').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Computadores', 'Notebooks', 'Tablets'],
            datasets: [{
                data: [{{ $stats['computadores'] }}, {{ $stats['notebooks'] }}, {{ $stats['tablets'] }}],
                backgroundColor: ['#0dcaf0', '#198754', '#ffc107'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'bottom' } }
        }
    });
</script>
@endsection