<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript">
$(document).ready(function(){
	$("#formnuevaCategoria").hide();
  $("#nuevaCategoria").click(function(){
    $("#formnuevaCategoria").show();
	});
	
   
});
	</script>

Desde puede ver categorias y agregar nuevas al test
    <p>Nombre del test: {{ $test->Nombre }}</p>
     <p>Descripcion: {{ $test->Descripcion }}</p>
     <div id=Categorias>
      @foreach ($categorias as $data)
    
  <a href="{{action('TestController@show',[$data->NombreCategoria])}}">{{$data->NombreCategoria}}</a>
  
@endforeach
     </div>
     <button id="nuevaCategoria">nueva categoria</button>
     
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
      
 
  

