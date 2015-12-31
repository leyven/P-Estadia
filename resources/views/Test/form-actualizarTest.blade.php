@extends('master-layout')
@section('tittle','Actualizar test')
@section('embded-script')

  <script type="text/javascript">
$(document).ready(function(){
  $("#formnuevaCategoria").hide();
  $("#formeditarTest").hide();
  ///
  $("#nuevaCategoria").click(function(){
    $("#formnuevaCategoria").toggle();
  });
  
  $("#editarTest").click(function(){
    $("#formeditarTest").toggle();
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
     <button id="editarTest">editar informacion del test</button>
     
     <div id="formnuevaCategoria">

     <div class="form-group">

          {!!Form::open(array('action' => 'CategoriasController@store')) !!}
           <!--- 
         |  Label-Cont: Nombre:
         |nameText: NombreTest
         |class: NombreTest
         |id: NombreTest
          -->
         {!! Form::label('name','Nombre:')!!}
         {!! Form::text('NombreCategoria',null,['class'=>'NombreTest','id'=>'NombreTest'])!!}   
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
        
        
          {!!Form::submit('Enviar')!!} 
          {!! Form::close() !!}
    </div>
  
     </div>
<!--
hidden div para editar
-->
 <div id="formeditarTest">

     <div class="form-group">

           {!!Form::open(array('action' => 'TestController@edit')) !!}
           <!--- 
         |  Label-Cont: Nombre:
         |nameText: NombreTest
         |class: NombreTest
         |id: NombreTest
          -->
          {!! Form::hidden('idTest',$test->idTest)!!}
         {!! Form::label('name','Nombre:')!!}
         {!! Form::text('Nombre',$test->Nombre,['class'=>'NombreTest','id'=>'NombreTest'])!!}   
              </br>
            <!--- 
          |  Label-Cont: Descripcion:
          |nameText: Descripcion
          |class: DescripcionTest
          |id: DescripcionTest
           -->
          {!! Form::label('name','Descripcion:')!!}
          {!! Form::text('Descripcion',$test->Descripcion,['class'=>'DescripcionTest','id'=>'DescripcionTest'])!!}
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
          {!!Form::submit('Enviar')!!} 
         {!! Form::close() !!}
    </div>
  
     </div>

     <br><br>
  @endsection



    