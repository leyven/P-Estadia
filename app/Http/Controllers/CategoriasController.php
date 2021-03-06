<?php

namespace Estadia\Http\Controllers;
use Estadia\Categorias;
use Illuminate\Http\Request;
use Input;
use Estadia\Http\Requests;
use Estadia\Http\Controllers\Controller;

class CategoriasController extends Controller
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
        
        $Categoria=Categorias::create($input);
        
      

       return redirect('categorias/nuevo/'.$Categoria->idCategoria.'');
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Categoria= Categorias::findOrFail($id);
        //recupera el test al que pertenece
        $Test=$Categoria->test;
        $Preguntas=$Categoria->ObtenerPreguntas;
        
         
        
         return view('Categoria.actualizar-Categoria')->with('Categoria',$Categoria)->with('Test',$Test)->with('Preguntas',$Preguntas);   
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
        
        $EditarTest = Categorias::find($input['idCategoria']);
        $EditarTest->NombreCategoria = $input['NombreCategoria'];
        $EditarTest->Orden = $input['Orden'];
        $EditarTest->save();
         return redirect('categorias/nuevo/'.$input['idCategoria']."");
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
    public function destroy($id,$idtest)
    {
        Categorias::destroy($id);

        return redirect('test/mostrar/'.$idtest.'');
    }
}
