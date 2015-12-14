<?php

namespace Estadia\Http\Controllers;

use Illuminate\Http\Request;
use Estadia\Pregunta;
use Input;
use Estadia\Http\Requests;
use Estadia\Http\Controllers\Controller;

class PreguntasController extends Controller
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

        $input = Input::all();
        
        $pregunta=Pregunta::create($input);
        

        $Test= $pregunta->ObtenerTest($input['idTest']);
        //aca se crean los incisos
      
        $pregunta->crearIncisos($Test->IncisosEnPreguntas);
      

       return redirect('preguntas/mostrar/'.$pregunta->idPregunta.'/'.$input['idTest']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$idTest)
    {

                $pregunta= Pregunta::findOrFail($id);
               $Categoria=$pregunta->ObtenerCategoria;
               $Test= $pregunta->ObtenerTest($idTest);
               $Incisos=$pregunta->ObtenerIncisos;
               
        return view('Preguntas.CrearIncisos')->with('Pregunta',$pregunta)->with('Test',$Test)->with('Categoria',$Categoria)->with('Incisos',$Incisos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $input = Input::all();
        
        $EditarTest = Pregunta::find($input['idPregunta']);
        $EditarTest->Contenido = $input['Contenido'];
        $EditarTest->Orden = $input['Orden'];
        $EditarTest->save();
         return redirect('preguntas/mostrar/'.$input['idPregunta']."/".$input['idTest']);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$idCategoria)
    {
          Pregunta::destroy($id);
           return redirect('categorias/nuevo/'.$idCategoria.'');

    }
}
