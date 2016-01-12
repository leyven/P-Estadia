@extends('master-layout')
@section('embded-script')
<script type="text/javascript">

  /*
    |--------------------------------------------------------------------------
    | funciones
    |--------------------------------------------------------------------------
    |
    */

function validarN(){
  return  $('#NuevaPregunta').jqxValidator('validate');          
}
function validarE(){
  return  $('#EditarCategoria').jqxValidator('validate');          
}
function hideForms() {
  $("#formnuevaPregunta").hide();
  $("#formEditarCategoria").hide();              
}
$(document).ready(function(){
    /*
    |--------------------------------------------------------------------------
    | Botones
    |--------------------------------------------------------------------------
    |
    */
    $('#Contenido').jqxTextArea({
    placeHolder: "Pregunta",
    height: 50,
    width: 200,
    minLength: 1,
    theme: 'energyblue'
});
 $("#nuevaPregunta").jqxButton({
                theme: 'energyblue',
                width: 100,
                height: 40,
                disabled: false
            });
  $("#editarCategoria").jqxButton({
                theme: 'energyblue',
                width: 100,
                height: 40,
                disabled: false
            });

    /*
    |--------------------------------------------------------------------------
    | Validacion con jqwidgets
    |--------------------------------------------------------------------------
    |
    */
    $('#NuevaPregunta').jqxValidator({ 

                onError: function () {
                alert('No has llenado los campos correctamente');
                },
                rules: [
                  { input: '#Contenido', message: 'Campo requerido!', action: 'keyup', rule: 'required' },                                   
                  { input: '#Orden', message: 'Campo requerido!', action: 'keyup', rule: 'required' }]
                });

            $("#irAPreguntas").jqxButton({
                theme: 'energyblue',
                width: 200,
                height: 30,
                disabled: false
            });
            $("#Seguir").jqxButton({
                theme: 'energyblue',
                width: 200,
                height: 30,
                disabled: false
            });
            $('#NuevaCategoria').on('validationSuccess', function (event) {
                alert('Has llenado los campos con exito')
            });      
    
    ////Validacion Editar Test
    $('#EditarCategoria').jqxValidator({ 
                onError: function () {
                alert('No has llenado los campos correctamente');
                },
                rules: [
                  { input: '#NombreCategoria', message: 'Campo requerido!', action: 'keyup', rule: 'required' },                                   
                  { input: '#Orden', message: 'Campo requerido!', action: 'keyup', rule: 'required' }]
                });
            $("#Guardar").jqxButton({
                theme: 'energyblue',
                width: 100,
                height: 30,
                disabled: false
            });
            $('#EditarCategoria').on('validationSuccess', function (event) {
                alert('Has llenado los campos con exito')
            });     
    /*
    |--------------------------------------------------------------------------
    | Acciones del formulario
    |--------------------------------------------------------------------------
    |
    */
hideForms();
  $("#nuevaPregunta").click(function(){
$("#formEditarCategoria").hide(); 
    $("#formnuevaPregunta").toggle();
  });

$("#editarCategoria").click(function(){
   $("#formnuevaPregunta").hide();
    $("#formEditarCategoria").toggle();
  }); 
$("#Seguir").click(function(){
   $("#Opcion").val('1');
});
  $("#irAPreguntas").click(function(){
  $("#Opcion").val('2');
    
  });    

});
  </script>
 
    
@endsection
@section('tittle','editar incisos')

@section('barra-navegacion')
bara de navegacion
<br>
 <a href="/P-Estadia/public/">inicio</a>
 <a href="/P-Estadia/public/test/mostrar">Listado de Test</a>
  <a href="/P-Estadia/public/test/mostrar/{{$Test->idTest}}">Test {{$Test->Nombre}}</a>
@endsection
@section('contenido')

 Categorias de {{$Test->Nombre}}
modificar categoria
<p>Test: {{$Test->Nombre}}</p>
<p>Preguntas en : {{ $Categoria->NombreCategoria }}
  <br>
   @foreach ($Preguntas as $data)
    
  <a href="{{action('PreguntasController@show',[$data->idPregunta,$Test->idTest])}}">{{$data->Contenido}}</a>
  <a href="{{action('PreguntasController@destroy',[$data->idPregunta,$Categoria->idCategoria])}}">borrar</a>
  </br>
@endforeach

 <button id="nuevaPregunta">nueva pregunta</button>
 <button id="editarCategoria">Editar Categoria</button>
     <br>
     <br>
     <div id="formnuevaPregunta">

     <div class="form-group">

          {!!Form::open(array('action' => 'PreguntasController@store','id'=>'NuevaPregunta','onsubmit'=>'return validarN()')) !!}
           <!--- 
         |  Label-Cont: Nombre:
         |nameText: NombreTest
         |class: NombreTest
         |id: NombreTest
          -->
         {!! Form::label('name','Contenido de la pregunta:')!!}
         {!! Form::textarea('Contenido',null,['class'=>'Contenido','id'=>'Contenido'])!!}   
              </br>
         <!---
          |  Label-Cont: Descripcion:
          |nameText: Descripcion
          |class: DescripcionTest
          |id: DescripcionTest
          -->
          {!! Form::label('name','orden de la pregunta:')!!}
           {!! Form::hidden('idCategoria',$Categoria->idCategoria)!!}
            {!! Form::hidden('idTest',$Test->idTest)!!}
              {!! Form::hidden('Opcion',null,['class'=>'Opcion','id'=>'Opcion'])!!}
          {!! Form::text('Orden',null,['class'=>'Orden','id'=>'Orden'])!!}
          </br>
        
        
          {!!Form::submit('guardar y editar pregunta',['class'=>'irAPreguntas','id'=>'irAPreguntas'])!!} 
          {!!Form::submit('Guardar y seguir agregando',['class'=>'Seguir','id'=>'Seguir'])!!} 
          {!! Form::close() !!}
    </div>
  
     </div>
<div id="formEditarCategoria">

     <div class="form-group">

          {!!Form::open(array('action' => 'CategoriasController@edit','id'=>'EditarCategoria','onsubmit'=>'return validarE()')) !!}
           <!--- 
         |  Label-Cont: Nombre:
         |nameText: NombreTest
         |class: NombreTest
         |id: NombreTest
          -->
         {!! Form::label('name','Nombre:')!!}
         {!! Form::text('NombreCategoria',$Categoria->NombreCategoria,['class'=>'NombreCategoria','id'=>'NombreCategoria'])!!}   
              </br>
         <!---
          |  Label-Cont: Descripcion:
          |nameText: Descripcion
          |class: DescripcionTest
          |id: DescripcionTest
          -->
          {!! Form::label('name','orden de la categoria:')!!}
           {!! Form::hidden('idCategoria',$Categoria->idCategoria)!!}
          {!! Form::text('Orden',$Categoria->Orden,['class'=>'Orden','id'=>'Orden'])!!}
          </br>
        
        
          {!!Form::submit('guardar',['class'=>'Guardar','id'=>'Guardar'])!!} 

          {!! Form::close() !!}
    </div>
  
     </div>

     <br><br>
@endsection
	