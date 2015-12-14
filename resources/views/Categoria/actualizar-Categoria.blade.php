<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript">

function hideForms() {
    $("#formnuevaPregunta").hide();
  $("#formEditarCategoria").hide();              // The function returns the product of p1 and p2
}

$(document).ready(function(){
hideForms();
  $("#nuevaPregunta").click(function(){
$("#formEditarCategoria").hide(); 
    $("#formnuevaPregunta").toggle();
	});

$("#editarCategoria").click(function(){
   $("#formnuevaPregunta").hide();
    $("#formEditarCategoria").toggle();
  });	
   
});
	</script>
 bara de navegacion
<br>
 <a href="/P-Estadia/public/">inicio</a>
 <a href="/P-Estadia/public/test/mostrar">Listado de Test</a>
  <a href="/P-Estadia/public/test/mostrar/{{$Test->idTest}}">Test {{$Test->Nombre}}</a>
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

          {!!Form::open(array('action' => 'PreguntasController@store')) !!}
           <!--- 
         |  Label-Cont: Nombre:
         |nameText: NombreTest
         |class: NombreTest
         |id: NombreTest
          -->
         {!! Form::label('name','Contenido de la pregunta:')!!}
         {!! Form::text('Contenido',null,['class'=>'Contenido','id'=>'Contenido'])!!}   
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
          {!! Form::text('Orden',null,['class'=>'Orden','id'=>'Orden'])!!}
          </br>
        
        
          {!!Form::submit('Enviar')!!} 
          {!! Form::close() !!}
    </div>
	
     </div>
<div id="formEditarCategoria">

     <div class="form-group">

          {!!Form::open(array('action' => 'CategoriasController@edit')) !!}
           <!--- 
         |  Label-Cont: Nombre:
         |nameText: NombreTest
         |class: NombreTest
         |id: NombreTest
          -->
         {!! Form::label('name','Nombre:')!!}
         {!! Form::text('NombreCategoria',$Categoria->NombreCategoria,['class'=>'NombreTest','id'=>'NombreTest'])!!}   
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
        
        
          {!!Form::submit('editar')!!} 
          {!! Form::close() !!}
    </div>
  
     </div>

     <br><br>
    