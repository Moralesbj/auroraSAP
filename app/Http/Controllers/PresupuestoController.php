<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presupuesto;
use Illuminate\Support\Facades\Auth;

class PresupuestoController extends Controller
{
    public function index()
    {
        $presupuestos = Presupuesto::where('user_id', Auth::id())->get();
        return view('presupuestos.index', compact('presupuestos'));
    }

    public function create()
    {
        return view('presupuestos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_partida' => 'required|string|max:255',
            'monto_asignado' => 'required|numeric',
            'fecha_creacion' => 'required|date',
        ]);

        Presupuesto::create([
            'nombre_partida' => $request->nombre_partida,
            'monto_asignado' => $request->monto_asignado,
            'fecha_creacion' => $request->fecha_creacion,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('presupuestos.index')->with('success', 'Presupuesto creado exitosamente.');
    }

    public function edit(Presupuesto $presupuesto)
    {
        if ($presupuesto->user_id !== Auth::id()) {
            abort(403);
        }
        return view('presupuestos.edit', compact('presupuesto'));
    }

    public function update(Request $request, Presupuesto $presupuesto)
    {
        if ($presupuesto->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'nombre_partida' => 'required|string|max:255',
            'monto_asignado' => 'required|numeric',
            'fecha_creacion' => 'required|date',
        ]);

        $presupuesto->update($request->all());
        return redirect()->route('presupuestos.index')->with('success', 'Presupuesto actualizado exitosamente.');
    }

    public function destroy(Presupuesto $presupuesto)
    {
        if ($presupuesto->user_id !== Auth::id()) {
            abort(403);
        }

        $presupuesto->delete();
        return redirect()->route('presupuestos.index')->with('success', 'Presupuesto eliminado exitosamente.');
    }
}
// End of file: app/Http/Controllers/PresupuestoController.php