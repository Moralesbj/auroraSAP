<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;
use App\Models\Presupuesto;
use App\Models\Transaccion;

class ReporteController extends Controller
{
    public function index()
    {
        $reportes = Reporte::with('presupuesto')->get();
        return view('reportes.index', compact('reportes'));
    }

    public function generar(Request $request)
    {
        $presupuestoId = $request->input('presupuesto_id');
        $mes = $request->input('mes');

        $ingresos = Transaccion::where('presupuesto_id', $presupuestoId)
            ->where('tipo', 'ingreso')
            ->whereMonth('fecha', $mes)
            ->sum('monto');

        $egresos = Transaccion::where('presupuesto_id', $presupuestoId)
            ->where('tipo', 'egreso')
            ->whereMonth('fecha', $mes)
            ->sum('monto');

        Reporte::create([
            'mes' => $mes,
            'total_ingresos' => $ingresos,
            'total_egresos' => $egresos,
            'presupuesto_id' => $presupuestoId,
        ]);

        return redirect()->route('reportes.index')->with('success', 'Reporte generado');
    }
}
