<!DOCTYPE html>
<html>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <head>

  <title>Prestamos</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript">
$(document).ready(function(){

$( "#enviar" ).click(function() {
	alert("boton funciona");
$('#Test').submit(function() {
    // get all the inputs into an array.
    var inputs = $('#Test :input');

    // not sure if you wanted this, but I thought I'd add it.
    // get an associative array of just the values.
    var values = {};
    inputs.each(function() {
        values[this.name] = $(this).val();
    });
    alert(values);

});
});

//desactivado por ahora
$( "#s" ).change(function() {

	var NumeroCategorias= $("#Categorias").val();

	$( "#NombresCategorias" ).empty();
	for (var i=1;i<=NumeroCategorias;i++){

    

		var HtmlInputTextNombreC="<label>Nombre de Categoria"+i+"</label><input class='Nombres-Preguntas'type='text'name='Categoria[]'></br>";
		var HtmlText="<input class='no-Preguntas'type='text'name='NoPreguntaCategoria[]'>";
    var HtmlInputTextNumeroP="<label>Numero de preguntas de la categoria"+i+""+HtmlText+" </br>";
   	
      	$("#NombresCategorias").append(HtmlInputTextNombreC);
   			$("#NombresCategorias").append(HtmlInputTextNumeroP);
			}
  
});

	
    var option = '';
			for (var i=1;i<=20;i++){
   			option += '<option value="'+ i + '">' + i + '</option>';
			}
			//$('#Categorias').append(option);
});
});



	

	</script>
  </head>

  <body>
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
          <!--{!! Form::label('name','no sirve, desactivado de momento')!!}
          {!!Form::selectRange('Categorias', 0, 10,'default',array('class'=>'Categorias','id'=>'Categorias'))!!}
          
          </br>
          -->
          <div id="NombresCategorias"class="hidden">
          
          </div>  
          {!!Form::submit('Enviar')!!} 
         {!! Form::close() !!}
    </div>

  	<!-- PESTAÑAS DE OPCIONES -->



  </body>


</html>
