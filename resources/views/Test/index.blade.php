hola

Listado de Tests
@foreach ($test as $data)
    <p>{{ $data->Nombre }}</p>
  <a href='mostrar/{{$data->idTest}}' id="linkid">{{$data->Nombre}}</a>
  
@endforeach
