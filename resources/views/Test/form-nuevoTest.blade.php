@extends('master-layout')
@section('embded-script')
<script type="text/javascript">

    /*
    |--------------------------------------------------------------------------
    | Funciones 
    |--------------------------------------------------------------------------
    |
    */
    function validar(){
      return  $('#NuevoTest').jqxValidator('validate');          
    }
    /*
    |--------------------------------------------------------------------------
    | botones
    |--------------------------------------------------------------------------
    |
    */
    $('.AgregarContenido').jqxTextArea({
    placeHolder: "Descripcion del test",
    height: 50,
    width: 200,
    minLength: 1,
    theme: 'energyblue'
});
    /*
    |--------------------------------------------------------------------------
    | Validacion con jqwidgets
    |--------------------------------------------------------------------------
    |
    */


    $(document).ready(function () {
            $('#NuevoTest').jqxValidator({ 
                onError: function () {
                alert('No has llenado los campos correctamente');
                },
                rules: [
                  { input: '#NombreTest', message: 'Campo requerido!', action: 'keyup', rule: 'required' },                                   
                  { input: '#DescripcionTest', message: 'Campo requerido!', action: 'keyup', rule: 'required' },
                  { input: '.TipoTest', message: 'Campo Requerido', action: 'keyup', rule: 'required' }]
                });
            $("#SubmitTest").jqxButton({
                theme: 'energyblue',
                width: 100,
                height: 30,
                disabled: false
            });
            $('#NuevoTest').on('validationSuccess', function (event) {
                $('#SubmitTest').jqxButton({
                  disabled: false
                });
                alert('Has llenado los campos con exito')
            });      
    });
</script>
@endsection
@section('tittle','nuevo test')

@section('barra-navegacion')
 <!-- navegacion -->
barra de navegacion
<br>
 <a href="/P-Estadia/public/">inicio</a>
 <br><br>
@endsection
@section('contenido')
    <div class="form-group">

          {!!Form::open(array('action' => 'TestController@store','id' => 'NuevoTest','onsubmit'=>'return validar()')) !!}
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
          {!!Form::selectRange('IncisosEnPreguntas', 1, 10,'default',array('class'=>'IncisosEnPregunta','id'=>'IncisosEnPregunta'))!!}
          </br>
          <!--- 
            |input1: Estilos de Aprendizaje
            |input2: Habitos de Estudio
            |valor1: 0
            |valor2: 1
            
             -->
          {!!Form::radio('TipoTest', '0', true,['class' => 'TipoTest'])!!} 
          {!! Form::label('name','Estilos de Aprendizaje')!!}
          {!!Form::radio('TipoTest', '1', true,['class' => 'TipoTest'])!!} 
          {!! Form::label('name','Habitos de Estudio')!!}
          </br>
          <!--{!! Form::label('name','no sirve, desactivado de momento')!!}
          {!!Form::selectRange('Categorias', 0, 10,'default',array('class'=>'Categorias','id'=>'Categorias'))!!}
          
          </br>
          -->
          <div id="NombresCategorias"class="hidden">
          
          </div>  
          {!!Form::submit('Enviar',['id'=>'SubmitTest'])!!} 
         {!! Form::close() !!}
    </div>

@endsection



     

  


