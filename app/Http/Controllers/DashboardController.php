<?php

namespace App\Http\Controllers;

use App\Models\Presupuesto;
use App\Models\Transaccion;
use App\Models\Reporte;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPresupuestos = Presupuesto::count();
        $totalTransacciones = Transaccion::count();
        $ultimoReporte = Reporte::latest('fecha')->first();
        $ultimoReporteMes = $ultimoReporte ? date('F Y', strtotime($ultimoReporte->fecha)) : 'No disponible';

        // Crear arreglo vacío con meses inicializados en 0
        $meses = array_fill(1, 12, 0);

        // Transacciones por mes
        $transaccionesRaw = Transaccion::selectRaw('MONTH(fecha) as mes, COUNT(*) as cantidad')
            ->groupBy('mes')
            ->pluck('cantidad', 'mes')
            ->toArray();

        $transaccionesMensuales = array_replace($meses, $transaccionesRaw);

        // Reportes por mes
        $reportesRaw = Reporte::selectRaw('MONTH(fecha) as mes, COUNT(*) as cantidad')
            ->groupBy('mes')
            ->pluck('cantidad', 'mes')
            ->toArray();

        $reportesMensuales = array_replace($meses, $reportesRaw);

        return view('dashboard', compact(
            'totalPresupuestos',
            'totalTransacciones',
            'ultimoReporteMes',
            'transaccionesMensuales',
            'reportesMensuales'
        ));
    }
}
