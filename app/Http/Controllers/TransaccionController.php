<?php

namespace App\Http\Controllers;

use App\Models\Transaccion;
use App\Models\Presupuesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaccionController extends Controller
{
    public function index()
    {
        $transacciones = Transaccion::where('user_id', Auth::id())->with('presupuesto')->get();
        return view('transacciones.index', compact('transacciones'));
    }

    public function create()
    {
        $presupuestos = Presupuesto::where('user_id', Auth::id())->get();
        return view('transacciones.create', compact('presupuestos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
            'presupuesto_id' => 'required|exists:presupuestos,id',
        ]);

        Transaccion::create([
            'descripcion' => $request->descripcion,
            'monto' => $request->monto,
            'fecha' => $request->fecha,
            'presupuesto_id' => $request->presupuesto_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('transacciones.index')->with('success', 'Transacción registrada exitosamente.');
    }

    public function edit(Transaccion $transaccion)
    {
        $presupuestos = Presupuesto::where('user_id', Auth::id())->get();
        return view('transacciones.edit', compact('transaccion', 'presupuestos'));
    }

    public function update(Request $request, Transaccion $transaccion)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
            'presupuesto_id' => 'required|exists:presupuestos,id',
        ]);

        $transaccion->update($request->all());

        return redirect()->route('transacciones.index')->with('success', 'Transacción actualizada exitosamente.');
    }

    public function destroy(Transaccion $transaccion)
    {
        $transaccion->delete();
        return redirect()->route('transacciones.index')->with('success', 'Transacción eliminada correctamente.');
    }
}
