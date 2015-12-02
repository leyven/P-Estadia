hola

Listado de Tests
@foreach ($test as $data)
    <p>{{ $data->Nombre }}</p>
  <a href="{{action('TestController@show',[$data->idTest])}}">{{$data->Nombre}}</a>
  
@endforeach
