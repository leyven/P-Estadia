@extends('master-layout')
@section('tittle','Actualizar test')
@section('embded-script')

  <script type="text/javascript">
  /*
    |--------------------------------------------------------------------------
    | funciones
    |--------------------------------------------------------------------------
    |
    */

function validarN(){
  return  $('#NuevaCategoria').jqxValidator('validate');          
}
function validarE(){
  return  $('#EditarTest').jqxValidator('validate');          
}
$(document).ready(function(){
      /*
    |--------------------------------------------------------------------------
    | Botones
    |--------------------------------------------------------------------------
    |
    */
    $('#Descripcion').jqxTextArea({
    placeHolder: "Descripcion del test",
    height: 50,
    width: 200,
    minLength: 1,
    theme: 'energyblue'
});
            $("#SubmitN").jqxButton({
                theme: 'energyblue',
                width: 100,
                height: 30,
                disabled: false
            });

            $("#SubmitE").jqxButton({
                theme: 'energyblue',
                width: 100,
                height: 30,
                disabled: false
            });

            $("#nuevaCategoria").jqxButton({
                theme: 'energyblue',
                width: 120,
                height: 30,
                disabled: false
            });
            $("#editarTest").jqxButton({
                theme: 'energyblue',
                width: 120,
                height: 30,
                disabled: false
            });

    /*
    |--------------------------------------------------------------------------
    | Validacion con jqwidgets
    |--------------------------------------------------------------------------
    |
    */

    $('#NuevaCategoria').jqxValidator({ 

                onError: function () {
                alert('No has llenado los campos correctamente');
                },
                rules: [
                  { input: '#NombreCategoria', message: 'Campo requerido!', action: 'keyup', rule: 'required' },                                   
                  { input: '#Orden', message: 'Campo requerido!', action: 'keyup', rule: 'required' }]
                });


            $('#NuevaCategoria').on('validationSuccess', function (event) {
                alert('Has llenado los campos con exito')
            });      
    
    ////Validacion Editar Test
    $('#EditarTest').jqxValidator({ 
                onError: function () {
                alert('No has llenado los campos correctamente');
                },
                rules: [
                  { input: '.Nombre', message: 'Campo requerido!', action: 'keyup', rule: 'required' },                                   
                  { input: '.Descripcion', message: 'Campo requerido!', action: 'keyup', rule: 'required' }]
                });

            $('#EditarTest').on('validationSuccess', function (event) {
                alert('Has llenado los campos con exito')
            });      
   

    /*
    |--------------------------------------------------------------------------
    | Acciones del formulario
    |--------------------------------------------------------------------------
    |
    */

  $("#formnuevaCategoria").hide();
  $("#formeditarTest").hide();
  ///
  $("#nuevaCategoria").click(function(){
    $("#formnuevaCategoria").toggle();
      $("#formeditarTest").hide();
  });
  
  $("#editarTest").click(function(){
    $("#formeditarTest").toggle();
  $("#formnuevaCategoria").hide();

  });
   
});
  </script>
@endsection
  @section('barra-navegacion')
    
    bara de navegacion
    <br>
 <a href="/P-Estadia/public/">inicio</a>
 <a href="/P-Estadia/public/test/mostrar">Listado de Test</a>
 Categorias de {{$test->Nombre}}
    <br>  
 </br>

@endsection
 
  @section('contenido')
  Desde aca puede ver categorias y agregar nuevas al test
    
     <p>Descripcion: {{ $test->Descripcion }}</p>
     <div id='Categorias'>
      <p>Categorias del test {{ $test->Nombre }}</p>
      @foreach ($categorias as $data)
    
  <a href="{{action('CategoriasController@show',[$data->idCategoria])}}">{{$data->NombreCategoria}}</a>
  <a href="{{action('CategoriasController@destroy',[$data->idCategoria,$test->idTest])}}">borrar</a>
  <br>
@endforeach
<br>
     </div>

     <button id="nuevaCategoria">nueva categoria</button>
     <button id="editarTest">editar test</button>
     
     <div id="formnuevaCategoria">

     <div class="form-group">

          {!!Form::open(array('action' => 'CategoriasController@store','id'=>'NuevaCategoria','onsubmit'=>'return validarN()')) !!}
           <!--- 
         |  Label-Cont: Nombre:
         |nameText: NombreTest
         |class: NombreTest
         |id: NombreTest
          -->
         {!! Form::label('name','Nombre:')!!}
         {!! Form::text('NombreCategoria',null,['class'=>'NombreTest','id'=>'NombreCategoria'])!!}   
              </br>
         <!---
          |  Label-Cont: Descripcion:
          |nameText: Descripcion
          |class: DescripcionTest
          |id: DescripcionTest
          -->
          {!! Form::label('name','orden de la categoria:')!!}
           {!! Form::hidden('idTest',$test->idTest)!!}
          {!! Form::text('Orden',null,['class'=>'Orden','id'=>'Orden'])!!}
          </br>
        
        
          {!!Form::submit('Enviar',['id'=>'SubmitN'])!!} 
          {!! Form::close() !!}
    </div>
  
     </div>
<!--
hidden div para editar
-->
 <div id="formeditarTest">

     <div class="form-group">

           {!!Form::open(array('action' => 'TestController@edit','id'=>'EditarTest','onsubmit'=>'return validarE()')) !!}
           <!--- 
         |  Label-Cont: Nombre:
         |nameText: NombreTest
         |class: NombreTest
         |id: NombreTest
          -->
          {!! Form::hidden('idTest',$test->idTest)!!}
         {!! Form::label('name','Nombre:')!!}
         {!! Form::text('Nombre',$test->Nombre,['class'=>'Nombre','id'=>'Nombre'])!!}   
              </br>
            <!--- 
          |  Label-Cont: Descripcion:
          |nameText: Descripcion
          |class: DescripcionTest
          |id: DescripcionTest
           -->
          {!! Form::label('name','Descripcion:')!!}
          {!! Form::textarea('Descripcion',$test->Descripcion,['class'=>'Descripcion','id'=>'Descripcion'])!!}
          </br>
        <!--- 
      |  Label-Cont: Incisos por pregunta:
      |nameText: Incisos
      |class: Inciso
      |id: Inciso
       -->
         
          <!--- 
            |input1: Estilos de Aprendizaje
            |input2: Habitos de Estudio
            |valor1: 0
            |valor2: 1
            
             -->
          {!!Form::radio('TipoTest', '0', true)!!} 
          {!! Form::label('name','Estilos de Aprendizaje')!!}
          {!!Form::radio('TipoTest', '1', true)!!} 
          {!! Form::label('name','Habitos de Estudio')!!}
          </br>
          <!--{!! Form::label('name','no sirve, desactivado de momento')!!}
          {!!Form::selectRange('Categorias', 0, 10,'default',array('class'=>'Categorias','id'=>'Categorias'))!!}
          
          </br>
          -->
          <div id="NombresCategorias"class="hidden">
          
          </div>  
          {!!Form::submit('Enviar',['id'=>'SubmitE'])!!} 
         {!! Form::close() !!}
    </div>
  
     </div>

     <br><br>
  @endsection



    