<?php

namespace Estadia;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
	protected $table = 'test';
    protected $fillable= [
	
           'Descripcion',
           'NumeroPreguntas',
           'IncisosEnPreguntas',
           'TipoTest',
           'Categorias'
    ];
}
