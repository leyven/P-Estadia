<?php

namespace Estadia;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
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
    	return $this->hasMany('Estadia\Categorias');
    }
}
