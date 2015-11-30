<?php

namespace Estadia;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
   protected $fillable= [
		   'NombreCategoria',
           'idTest',
           'NumeroDePreguntas',
           'Orden'
           
           
    ];
    
    public function test()
    {
    	return $this->belongsTo('Estadia\Test');
    }
}
