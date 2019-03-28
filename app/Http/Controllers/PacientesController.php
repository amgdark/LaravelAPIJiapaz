<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Paciente::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paciente = Paciente::create($request->all());
        $mensaje = [
            "mensaje" =>  "Se creo con éxito el paciente $paciente->nombre"
        ];
        return response($mensaje, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paciente = Paciente::find($id);
        if ($paciente!=null)
            return $paciente;
        $mensaje = ["mensaje" => "No se encontro el paciente con el id ${id} "];
        return response($mensaje, 404);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paciente = Paciente::find($id);
        if ($paciente!=null){
            $paciente->update($request->all());
            $mensaje = [
                "mensaje" =>  "Se actualizó el paciente $paciente->nombre"
            ];
            return response($mensaje, 200);
        }
        $mensaje = [
            "mensaje" =>  "No se  encontró el paciente con id $id"
        ];
        return response($mensaje, 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = Paciente::find($id);

        if ($paciente!=null){
            $nombre = $paciente->nombre;
            $paciente->delete();
            $mensaje = [
                "mensaje" =>  "Se eliminó el paciente $nombre"
            ];
            return response($mensaje, 200);
        }
        $mensaje = [
            "mensaje" =>  "No se  encontró el paciente con id $id"
        ];
        return response($mensaje, 404);
    }
}
