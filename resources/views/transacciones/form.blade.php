<div class="space-y-4">
    <div>
        <label for="descripcion" class="block font-medium text-sm text-gray-700">Descripción</label>
        <input type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', $transaccion->descripcion ?? '') }}"
            class="w-full border-gray-300 rounded-md shadow-sm">
    </div>

    <div>
        <label for="monto" class="block font-medium text-sm text-gray-700">Monto</label>
        <input type="number" name="monto" id="monto" step="0.01" value="{{ old('monto', $transaccion->monto ?? '') }}"
            class="w-full border-gray-300 rounded-md shadow-sm">
    </div>

    <div>
        <label for="fecha" class="block font-medium text-sm text-gray-700">Fecha</label>
        <input type="date" name="fecha" id="fecha" value="{{ old('fecha', isset($transaccion) ? $transaccion->fecha->format('Y-m-d') : '') }}"
            class="w-full border-gray-300 rounded-md shadow-sm">
    </div>

    <div>
        <label for="presupuesto_id" class="block font-medium text-sm text-gray-700">Presupuesto</label>
        <select name="presupuesto_id" id="presupuesto_id" class="w-full border-gray-300 rounded-md shadow-sm">
            @foreach ($presupuestos as $presupuesto)
                <option value="{{ $presupuesto->id }}"
                    @selected(old('presupuesto_id', $transaccion->presupuesto_id ?? '') == $presupuesto->id)>
                    {{ $presupuesto->nombre }}
                </option>
            @endforeach
        </select>
    </div>
</div>
