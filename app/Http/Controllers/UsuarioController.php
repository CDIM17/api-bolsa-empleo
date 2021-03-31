<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    function login(Request $request)
    {
        $user= Usuario::where('Usuario', $request->Usuario)->first();

        if($user)
        {
            $user= Usuario::where('Usuario', $request->Usuario)->
                            where('Contrasena',$request->Contrasena)->first();
            if($user)
            {
                return response(['mensaje' => 'Ok'],200); 
            }
            else
            {
                return response(['mensaje' => 'Password Incorrect'],404);
            }
        }
        else
        {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=null)
    {
        return $id? Usuario::find($id) : Usuario::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $usuario = new Usuario();

        $usuario->Nombre     = $request->Nombre;
        $usuario->Apellido   = $request->Apellido;
        $usuario->Usuario    = $request->Usuario;
        $usuario->Contrasena = $request->Contrasena;
        $usuario->ID_Rol     = $request->ID_Rol;
        $usuario->Correo     = $request->Correo;

        $result = $usuario->save();

        if($result)
        {
            return ["Result" => "Data have been saved"];
        }
        else
        {
            return ["Result" => "Operation Failed"];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
