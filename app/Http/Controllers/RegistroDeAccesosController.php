<?php

namespace App\Http\Controllers;

use App\Models\registroDeAccesos;
use Illuminate\Http\Request;

class RegistroDeAccesosController extends Controller
{
    public function get()
    {
        $accesos = registroDeAccesos::all();
        return $accesos;
    }

    public function post(Request $request)
    {
        $data = $request->validate($this->validateRequest());
        $accesos = registroDeAccesos::create($data);

        return response([
            'message' => 'acceso creado',
            'id' => $accesos['id']
        ], 200);
    }

    public function put(Request $request, $id)
    {
        $accesos = registroDeAccesos::find($id);

        if (!$accesos) {
            return response([
                'message' => 'acceso no encontrado.'
            ], 404);
        }

        $accesos->update($request->all());
        return response([
            'message' => 'acceso actualizada'
        ], 200);
    }

    public function del($id)
    {
        $accesos = registroDeAccesos::find($id);

        if (!$accesos) {
            return response([
                'message' => 'acceso no encontrado'
            ], 404);
        }

        $accesos->delete();

        return response([
            'message' => 'acceso eliminado'
        ], 202);
    }

    private function validateRequest()
    {
        return [
            'id_usuario' => 'required|numeric',
            'id_tarjeta' => 'required|numeric',
            'id_areas' => 'required|numeric'
        ];
    }
}
