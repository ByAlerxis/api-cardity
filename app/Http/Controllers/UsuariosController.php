<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function get()
    {
        $usuarios = usuarios::all();
        return $usuarios;
    }

    public function post(Request $request)
    {
        $data = $request->validate($this->validateRequest());
        $usuarios = usuarios::create($data);

        return response([
            'message' => 'Usuario creado.',
            'id' => $usuarios['id']
        ], 200);
    }

    public function put(Request $request, $id)
    {

        $usuarios = usuarios::findOrFail($id);

        if (!$usuarios) {
            return response([
                'message' => 'Usuario no encontrado.'
            ], 404);
        }


        $usuarios->update($request->all());
        return response([
            'message' => 'Usuario actualizado.'
        ], 200);
    }

    public function del(Request $request, $id)
    {
        $usuarios = usuarios::find($id);

        if (!$usuarios) {
            return response([
                'message' => 'Usuario no encontrado.'
            ], 404);
        }


        $usuarios->update($request->all());
        return response([
            'message' => 'Usuario actualizado.'
        ], 200);
    }

    private function validateRequest()
    {
        return [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'numero_de_empleado' => 'required|numeric',
            'activo_inactivo' => 'required|numeric',
            'eliminado' => 'required|numeric'
        ];
    }
}
