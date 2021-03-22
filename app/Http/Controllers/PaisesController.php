<?php

namespace App\Http\Controllers;

use App\Models\Paises;

use Illuminate\Http\Request;

class PaisesController extends Controller
{
    //

    public function index($id=null)
    {
        return $id ? Paises::find($id) : Paises::all();
    }
}
