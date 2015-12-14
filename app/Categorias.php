<?php

namespace Estadia;
use Estadia\Test;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
   protected $primaryKey = 'idCategoria';
   protected $table = 'categoria';
   protected $fillable= [
		   'NombreCategoria',
           'idTest',
           'NumeroDePreguntas',
           'Orden'
           
           
    ];
    
    public function test()
    {
    	return $this->belongsTo('Estadia\Test','idTest');
    }

    public function ObtenerPreguntas()
    {
     // return "hgoa";
      return $this->hasMany('Estadia\Pregunta','idCategoria');
    }
}
