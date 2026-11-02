<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inventário</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #4F46E5; color: white; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Inventário de Equipamentos - Escola</h2>
    <p>Gerado em: {{ date('d/m/Y H:i') }}</p>
    <table>
        <thead>
            <tr><th>Patrimônio</th><th>Tipo</th><th>Marca/Modelo</th><th>Local</th><th>Status</th></tr>
        </thead>
        <tbody>
            @foreach($equipamentos as $e)
            <tr>
                <td>{{ $e->patrimonio }}</td>
                <td>{{ $e->tipo }}</td>
                <td>{{ $e->marca }} {{ $e->modelo }}</td>
                <td>{{ $e->local }}</td>
                <td>{{ $e->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>