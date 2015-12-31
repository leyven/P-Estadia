@extends('master-layout')
@section('embded-script')
@endsection
@section('tittle','editar incisos')

@section('barra-navegacion')

bara de navegacion
<br>
 <a href="/P-Estadia/public/">inicio</a>
  Listado de test
<br>
@endsection
@section('contenido')
@foreach ($test as $data)
    <BR>
  <a href="{{action('TestController@show',[$data->idTest])}}">{{$data->Nombre}}</a>
  <a href="{{action('TestController@destroy',[$data->idTest])}}">borrar</a>
  
@endforeach
<br>

@endsection
