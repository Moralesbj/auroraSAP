@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold text-center text-indigo-700 mb-8">Bienvenido al Dashboard</h1>

{{-- Tarjetas de resumen --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-4">
        <h2 class="text-lg font-semibold">Presupuestos</h2>
        <p>Total: {{ $totalPresupuestos }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-4">
        <h2 class="text-lg font-semibold">Transacciones</h2>
        <p>Total: {{ $totalTransacciones }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-4">
        <h2 class="text-lg font-semibold">Reportes</h2>
        <p>Último: {{ $ultimoReporteMes }}</p>
    </div>
</div>

{{-- Gráficas --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white rounded-lg shadow p-4">
        <h2 class="text-lg font-semibold mb-4">Transacciones Mensuales (Barra)</h2>
        <canvas id="transaccionesBar"></canvas>
    </div>

    <div class="bg-white rounded-lg shadow p-4">
        <h2 class="text-lg font-semibold mb-4">Reportes Mensuales (Línea)</h2>
        <canvas id="reportesLinea"></canvas>
    </div>

    <div class="bg-white rounded-lg shadow p-4">
        <h2 class="text-lg font-semibold mb-4">Distribución Reportes (Pastel)</h2>
        <canvas id="reportesPastel"></canvas>
    </div>

    <div class="bg-white rounded-lg shadow p-4">
        <h2 class="text-lg font-semibold mb-4">Comparativa (Radar)</h2>
        <canvas id="comparativaRadar"></canvas>
    </div>

    <div class="bg-white rounded-lg shadow p-4 col-span-2">
        <h2 class="text-lg font-semibold mb-4">Área de Reportes</h2>
        <canvas id="reportesArea"></canvas>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Labels (meses del año)
    const labels = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];

    // Datos pasados desde el controlador
    const transacciones = @json(array_values($transaccionesMensuales));
    const reportes = @json(array_values($reportesMensuales));

    // Gráfica de barras
    new Chart(document.getElementById('transaccionesBar'), {
        type: 'bar',
        data: {
            labels,
            datasets: [{
                label: 'Transacciones',
                data: transacciones,
                backgroundColor: 'rgba(99, 102, 241, 0.6)',
                borderColor: 'rgba(99, 102, 241, 1)',
                borderWidth: 1
            }]
        }
    });

    // Gráfica de línea
    new Chart(document.getElementById('reportesLinea'), {
        type: 'line',
        data: {
            labels,
            datasets: [{
                label: 'Reportes',
                data: reportes,
                backgroundColor: 'rgba(34,197,94,0.2)',
                borderColor: 'rgba(34,197,94,1)',
                borderWidth: 2,
                fill: false,
                tension: 0.3
            }]
        }
    });

    // Gráfica de pastel
    new Chart(document.getElementById('reportesPastel'), {
        type: 'pie',
        data: {
            labels,
            datasets: [{
                label: 'Reportes',
                data: reportes,
                backgroundColor: labels.map(() => `hsl(${Math.random() * 360}, 70%, 70%)`)
            }]
        }
    });

    // Gráfica de radar
    new Chart(document.getElementById('comparativaRadar'), {
        type: 'radar',
        data: {
            labels,
            datasets: [
                {
                    label: 'Transacciones',
                    data: transacciones,
                    borderColor: 'rgba(59,130,246,1)',
                    backgroundColor: 'rgba(59,130,246,0.3)'
                },
                {
                    label: 'Reportes',
                    data: reportes,
                    borderColor: 'rgba(16,185,129,1)',
                    backgroundColor: 'rgba(16,185,129,0.3)'
                }
            ]
        }
    });

    // Gráfica de área
    new Chart(document.getElementById('reportesArea'), {
        type: 'line',
        data: {
            labels,
            datasets: [{
                label: 'Reportes',
                data: reportes,
                fill: true,
                backgroundColor: 'rgba(34,197,94,0.2)',
                borderColor: 'rgba(34,197,94,1)',
                tension: 0.4
            }]
        }
    });
</script>
@endsection
