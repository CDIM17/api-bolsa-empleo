<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=null)
    {
        return $id?$this->retornar_datos_vacante($id) : $this->retornar_todas_vacantes();
    }

    private function retornar_datos_vacante($id)
    {
        $datos = Vacante::Select(
            'Vacante.ID_Vacante',
            'Vacante.Compania',
            'Vacante.Logo',
            'Vacante.URL',
            'Vacante.Posicion',
            'Vacante.Descripcion',
            'Paises.Codigo as Codigo_Pais',
            'Paises.Nombre',
            'Ciudades.ID_Ciudad',
            'Ciudades.Nombre as Ciudad',
            'Categoria.ID_Categoria',
            'Categoria.Nombre as Categoria',
            'Vacante.ID_Tipo_Vacante',
            'Tipo_Vacante.Nombre as TipoVacante',
            'Vacante.Email',
            'Vacante.Ubicacion')->join('Tipo_Vacante',
            'Tipo_Vacante.ID_Tipo_Vacante','=','Vacante.ID_Tipo_Vacante')->join('Categoria',
            'Categoria.ID_Categoria','=','Vacante.ID_Categoria')->join('Ciudades',
            'Ciudades.ID_Ciudad','=','Vacante.ID_Ciudad')->join('Paises',
            'Paises.Codigo','=','Ciudades.Codigo_pais')->where('Vacante.ID_Vacante','=',$id)->orderBy('Vacante.ID_Vacante','desc')->get();

        return $datos;
    }


    private function retornar_todas_vacantes()
    {
        $datos = Vacante::Select(
            'Vacante.ID_Vacante',
            'Vacante.Compania',
            'Vacante.Logo',
            'Vacante.URL',
            'Vacante.Posicion',
            'Vacante.Descripcion',
            'Paises.Codigo as Codigo_Pais',
            'Paises.Nombre',
            'Ciudades.ID_Ciudad',
            'Ciudades.Nombre as Ciudad',
            'Categoria.ID_Categoria',
            'Categoria.Nombre as Categoria',
            'Vacante.ID_Tipo_Vacante',
            'Tipo_Vacante.Nombre as TipoVacante',
            'Vacante.Email',
            'Vacante.Ubicacion')->join('Tipo_Vacante',
            'Tipo_Vacante.ID_Tipo_Vacante','=','Vacante.ID_Tipo_Vacante')->join('Categoria',
            'Categoria.ID_Categoria','=','Vacante.ID_Categoria')->join('Ciudades',
            'Ciudades.ID_Ciudad','=','Vacante.ID_Ciudad')->join('Paises',
            'Paises.Codigo','=','Ciudades.Codigo_pais')->orderBy('Vacante.ID_Vacante','desc')->get();

        return $datos;
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
        $vacante = new Vacante();
        $vacante->Compania = $request->Compania;
        $vacante->URL = $request->URL;
        $vacante->Posicion = $request->Posicion;
        $vacante->ID_Categoria = $request->ID_Categoria;
        $vacante->Descripcion = $request->Descripcion;
        $vacante->ID_Tipo_Vacante = $request->ID_Tipo_Vacante;
        $vacante->ID_Ciudad = $request->ID_Ciudad;
        $vacante->Ubicacion = $request->Ubicacion;
        $vacante->Email = $request->Email;

        $result = $vacante->save();

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
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacante $vacante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $vacante = Vacante::find($request->ID_Vacante);
        $vacante->Compania = $request->Compania;
        $vacante->URL = $request->URL;
        $vacante->Posicion = $request->Posicion;
        $vacante->ID_Categoria = $request->ID_Categoria;
        $vacante->Descripcion = $request->Descripcion;
        $vacante->ID_Tipo_Vacante = $request->ID_Tipo_Vacante;
        $vacante->ID_Ciudad = $request->ID_Ciudad;
        $vacante->Ubicacion = $request->Ubicacion;
        $vacante->Email = $request->Email;

        $result = $vacante->save();

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
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $vacante = Vacante::find($request->ID_Vacante);
        $result = $vacante->delete();

        if($result)
        {
            return ["result"=>"record has been deleted ".$vacante->ID_Vacante];
        }
        else
        {
            return ["result"=>"Delete Operation have failed"];
        }
    }
}
