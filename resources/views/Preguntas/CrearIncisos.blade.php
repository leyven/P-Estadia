@extends('master-layout')
@section('embded-script')
<script type="text/javascript">

function hideForms() {
    $("#formnuevaPregunta").hide();
  $("#formEditarPregunta").hide();              // The function returns the product of p1 and p2
}

$(document).ready(function(){
hideForms();
  $("#nuevaPregunta").click(function(){
$("#formEditarCategoria").hide(); 
    $("#formnuevaPregunta").toggle();
  });

$("#editarPregunta").click(function(){
   $("#formnuevaPregunta").hide();
    $("#formEditarPregunta").toggle();
  }); 

///reasignar valores
$(".obtenderDatos").click(function(){
  
  var contenido= $(this).attr('Contenido');
  var Orden= $(this).attr('Orden');
  var idInciso= $(this).attr('idInciso');
  $('#AgregarContenido').val(contenido);
  $('#AgregarOrden').val(Orden);
  $('#AgregarId').val(idInciso);
  }); 
   
});
  </script>
  

 
@endsection
@section('tittle','editar incisos')

@section('barra-navegacion')
bara de navegacion
<br>
 <a href="/P-Estadia/public/">inicio</a>
 ->
 <a href="/P-Estadia/public/test/mostrar">Listado de Test</a>
 ->
 <a href="/P-Estadia/public/test/mostrar/{{$Test->idTest}}">Test {{$Test->Nombre}}</a>
 ->
 <a href="/P-Estadia/public/categorias/nuevo/{{$Categoria->idCategoria}}">Categoria {{$Categoria->NombreCategoria}}</a>
 ->
 pregunta {{$Pregunta->Contenido}}
@endsection
@section('contenido')




<p>Test: {{$Test->Nombre}}</p>
<p>Categoria: {{ $Categoria->NombreCategoria }}
  <p>Incisos de la pregunta  {{$Pregunta->Contenido}}</p>
 


 <button id="editarPregunta">Editar Pregunta</button>
     
     
<div id="formEditarPregunta">

     <div class="form-group">

          {!!Form::open(array('action' => 'PreguntasController@edit')) !!}
           <!--- 
         |  Label-Cont: Nombre:
         |nameText: NombreTest
         |class: NombreTest
         |id: NombreTest
          -->
         {!! Form::label('name','Nombre:')!!}
         {!! Form::text('Contenido',null,['class'=>'Contenido','id'=>'Contenido'])!!}   
              </br>
         <!---
          |  Label-Cont: Descripcion:
          |nameText: Descripcion
          |class: DescripcionTest
          |id: DescripcionTest
          -->
          {!! Form::label('name','orden de la categoria:')!!}
           {!! Form::hidden('idPregunta',$Pregunta->idPregunta)!!}
           {!! Form::hidden('idTest',$Test->idTest)!!}
          {!! Form::text('Orden',null,['class'=>'Orden','id'=>'Orden'])!!}
          </br>
        
        
          {!!Form::submit('editar')!!} 
          {!! Form::close() !!}
    </div>
  
     </div>
         </br>
     @foreach ($Incisos as $data)
    

 Contenido: {{$data->Contenido}} Valor: {{$data->Orden}}
 <br>
  </br>
@endforeach
     <br><br>
     <p>Edicion de inciso</p>
<div id="formeditarInciso">

     <div class="form-group">
  {!!Form::open(array('action' => 'IncisosController@update')) !!}
         @foreach ($Incisos as $data)
          {!! Form::label('name[]','Contenido del inciso:')!!}
         {!! Form::text('Contenido[]',$data->Contenido,['class'=>'AgregarContenido','id'=>'AgregarContenido'])!!}
         <br>
         {!! Form::hidden('idInciso[]',$data->idInciso)!!}
         {!! Form::label('name','Valor del inciso:')!!}
           {!! Form::text('Orden[]',$data->Orden)!!}
         
         <br>
         @endforeach
           <!--- 
         |  Label-Cont: Nombre:
         |nameText: NombreTest
         |class: NombreTest
         |id: NombreTest
          -->
           
              </br>
         <!---
          |  Label-Cont: Descripcion:
          |nameText: Descripcion
          |class: DescripcionTest
          |id: DescripcionTest
          -->
          
           {!! Form::hidden('idTest',$Test->idTest)!!}
           {!! Form::hidden('idCategoria',$Categoria->idCategoria)!!}
           {!! Form::hidden('idPregunta',$Pregunta->idPregunta)!!}
           
          
          </br>
        
        
          {!!Form::submit('Enviar')!!} 
          {!! Form::close() !!}
          <a href="/P-Estadia/public/categorias/nuevo/{{$Categoria->idCategoria}}">Cancelar</a>
    </div>
  
     </div>
     
@endsection

	