<?php

namespace App\Http\Controllers;

use App\Models\areas;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    public function get()
    {
        $areas = areas::all();
        return $areas;
    }

    public function post(Request $request)
    {
        $data = $request->validate($this->validateRequest());
        $areas = areas::create($data);

        return response([
            'message' => 'area creada',
            'id' => $areas['id']
        ], 200);
    }

    public function put(Request $request, $id)
    {
        $areas = areas::find($id);

        if (!$areas) {
            return response([
                'message' => 'area no encontrada.'
            ], 404);
        }

        $areas->update($request->all());
        return response([
            'message' => 'area actualizada'
        ], 200);
    }

    public function del($id)
    {
        $areas = areas::find($id);

        if (!$areas) {
            return response([
                'message' => 'area no encontrada'
            ], 404);
        }

        $areas->delete();

        return response([
            'message' => 'area eliminada'
        ], 202);
    }

    private function validateRequest()
    {
        return [
            'nombre' => 'required|string',
            'activo/inactivo' => 'required|numeric',
            'eliminado' => 'required|numeric'
        ];
    }
}
