<?php

namespace Estadia\Http\Controllers;

use Illuminate\Http\Request;
use Estadia\Inciso;
use Input;
use Estadia\Http\Requests;
use Estadia\Http\Controllers\Controller;

class IncisosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //a
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         $input = Input::all();
       
       
       //pasar esto al modelo(futuro)
        for ($i=0; $i <count($input['Contenido']) ; $i++) { 
        $EditarInciso= Inciso::find($input['idInciso'][$i]);
        $EditarInciso->Contenido = $input['Contenido'][$i];
        $EditarInciso->Orden = $input['Orden'][$i];
        $EditarInciso->save();
        }
       
         return redirect('categorias/nuevo/'.$input['idCategoria']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
