<?php

namespace Estadia;

use Illuminate\Database\Eloquent\Model;

class Inciso extends Model
{
  protected $primaryKey = 'idInciso';
	  protected $table = 'inciso';
    protected $fillable= [
		       'Contenido',
           'idPregunta',
           'Orden',
           
           
    ];

    public function ObtenerPregunta()
    {
    	return $this->belongsTo('Estadia\Pregunta','idPregunta');
    }

}
