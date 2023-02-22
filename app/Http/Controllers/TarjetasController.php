<?php

namespace App\Http\Controllers;

use App\Models\tarjetas;
use Illuminate\Http\Request;

class TarjetasController extends Controller
{
    public function get()
    {
        $tarjetas = tarjetas::all();
        return $tarjetas;
    }

    public function post(Request $request)
    {
        $data = $request->validate($this->validateRequest());
        $tarjetas = tarjetas::create($data);

        return response([
            'message' => 'tarjeta creada.',
            'id' => $tarjetas['id']
        ], 200);
    }

    public function put(Request $request, $id)
    {

        $tarjetas = tarjetas::findOrFail($id);

        if (!$tarjetas) {
            return response([
                'message' => 'tarjeta no encontrada.'
            ], 404);
        }


        $tarjetas->update($request->all());
        return response([
            'message' => 'tarjeta actualizada.'
        ], 200);
    }

    public function del($id)
    {
        $tarjetas = tarjetas::find($id);

        if (!$tarjetas) {
            return response([
                'message' => 'tarjeta no encontrada.'
            ], 404);
        }

        $tarjetas->delete();

        return response([
            'message' => 'tarjeta eliminada.'
        ], 200);
    }

    private function validateRequest()
    {
        return [
            'id_usuario' => 'required|numeric',
            'id_areas' => 'required|numeric',
            'activo/inactivo' => 'required|numeric',
            'eliminado' => 'required|numeric'
        ];
    }
}
