bara de navegacion
<br>
 <a href="/P-Estadia/public/">inicio</a>
  Listado de test
<br>
@foreach ($test as $data)
    <BR>
  <a href="{{action('TestController@show',[$data->idTest])}}">{{$data->Nombre}}</a>
  <a href="{{action('TestController@destroy',[$data->idTest])}}">borrar</a>
  
@endforeach
<br>
