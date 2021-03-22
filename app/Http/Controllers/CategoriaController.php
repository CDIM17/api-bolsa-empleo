<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=null)
    {
        return $id?Categoria::find($id) : Categoria::all();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->Nombre=$request->Nombre;
        $result = $categoria->save();

        if($result)
        {
            return ["result" => "Data have been saved"];            
        }
        else
        {
            return ["result" => "Data Failed"];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $categoria = Categoria::find($request->ID_Categoria);
        $categoria->Nombre = $request->Nombre;

        $result = $categoria->save();

        if($result)
        {
            return ["result"=>"data have been updated"];
        }
        else
        {
            return ["result"=>"Operation Failed"];
        }

        return ["result"=>"Data is Updated"];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $categoria = Categoria::find($request->ID_Categoria);
        $result = $categoria->delete();

        if($result)
        {
            return ["result"=>"record has been deleted ".$categoria->ID_Categoria];
        }
        else
        {
            return ["result"=>"Delete Operation have failed"];
        }
    }
}
