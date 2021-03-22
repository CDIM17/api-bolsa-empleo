<?php

namespace App\Http\Controllers;

use App\Models\Ciudades;

use Illuminate\Http\Request;

class CiudadesController extends Controller
{
    //
    public function index($id=null)
    {
        return $id ? Ciudades::find($id) : Ciudades::all();
    }

    public function ciudades_pais($pais)
    {
        $query = Ciudades::Select(
                    'ID_Ciudad',
                    'Codigo',
                    'Nombre',
                    'Codigo_Pais')->where('Codigo_pais','=',$pais)->get();

        return $query;
    }
}
