<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript">
$(document).ready(function(){
	$("#nuevaCategoria").click(function(){

	});
	
   
});
	</script>

Desde puede ver categorias y agregar nuevas al test
    <p>{{ $test->Nombre }}</p>
     <p>{{ $test->Descripcion }}</p>
     <button id="nuevaCategoria">nueva categoria</button>
     
     <div id="formnuevaCategoria">

     <div class="form-group">

          {!!Form::open(array('action' => 'TestController@store')) !!}
           <!--- 
         |  Label-Cont: Nombre:
         |nameText: NombreTest
         |class: NombreTest
         |id: NombreTest
          -->
         {!! Form::label('name','Nombre:')!!}
         {!! Form::text('Nombre',null,['class'=>'NombreTest','id'=>'NombreTest'])!!}   
              </br>
            <!--- 
          |  Label-Cont: Descripcion:
          |nameText: Descripcion
          |class: DescripcionTest
          |id: DescripcionTest
           -->
          {!! Form::label('name','Descripcion:')!!}
          {!! Form::text('Descripcion',null,['class'=>'DescripcionTest','id'=>'DescripcionTest'])!!}
          </br>
        <!--- 
      |  Label-Cont: Incisos por pregunta:
      |nameText: Incisos
      |class: Inciso
      |id: Inciso
       -->
          {!! Form::label('name','Numero de Incisos por pregunta')!!}
          {!!Form::selectRange('IncisosEnPreguntas', 0, 10,'default',array('class'=>'IncisosEnPregunta','id'=>'IncisosEnPregunta'))!!}
          </br>
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
          {!! Form::label('name','no sirve, desactivado de momento')!!}
          {!!Form::selectRange('Categorias', 0, 10,'default',array('class'=>'Categorias','id'=>'Categorias'))!!}
          </br>
          <div id="NombresCategorias"class="hidden">

          </div>  
          {!!Form::submit('Enviar')!!} 
         {!! Form::close() !!}
    </div>
	
     </div>
      
 
  

