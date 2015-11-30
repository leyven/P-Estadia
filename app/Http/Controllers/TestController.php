<?php namespace Estadia\Http\Controllers;

use Estadia\Test;
use Illuminate\Http\Request;
use Input;
use Estadia\Http\Requests;
use Estadia\Http\Controllers\Controller;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = Test::all();
        return view('Test.index')->with('test',$test);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Test.form-nuevoTest');
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
       $input = Input::except('Categoria','NoPreguntaCategoria');
       $NombreCategoria = Input::get('Categoria');
       $NumeroPreguntas = Input::get('NoPreguntaCategoria');
        /*desactivado de momento
        $contador=0;
        foreach ($NumeroPreguntas as $valor) {
        $contador=$valor+$contador;
        }
        $input['NumeroPreguntas']=$contador;
       */
       Test::create($input);
       return redirect('test/nuevo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
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
    public function destroy($id)
    {
        //
    }
}
