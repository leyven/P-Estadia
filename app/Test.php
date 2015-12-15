<?php

namespace Estadia;
use Estadia\Categorias;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $primaryKey = 'idTest';
	  protected $table = 'test';
    protected $fillable= [
		       'Nombre',
           'Descripcion',
           'NumeroPreguntas',
           'IncisosEnPreguntas',
           'TipoTest',
           'Categorias'
    ];

    public function Categorias()
    {
     // por alguna razon esto no funciona
    	return $this->hasMany('Categorias');
    }
    public function ListarCategorias()
    {
     // return "hgoa";
      return $this->hasMany('Estadia\Categorias','idTest');
    }
    public function LlenarPreguntas($idTest){

    }
}
