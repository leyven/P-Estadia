<?php

namespace Estadia;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $primaryKey = 'idPregunta';
   protected $table = 'pregunta';
   protected $fillable= [
		   'Contenido',
           'idCategoria',
           'Orden'
           
           
           
    ];
    
    public function ObtenerCategoria()
    {
    	return $this->belongsTo('Estadia\Categorias','idCategoria');
    }
    public function ObtenerTest($idTest)
    {
      $testInciso = \DB::table('test')->where('idTest', $idTest)->first();

      return $testInciso;
    }
    public function crearIncisos($incisos)
    {
      for ($i=1; $i <=$incisos ; $i++) 
      {
        \DB::table('inciso')->insert(
                ['Contenido' => 'pregunta'.$i, 
                'idPregunta' =>$this->idPregunta ,
                'Orden' =>$i
                 ]);  
      }
      
    }

    public function ObtenerIncisos()
    {
     // return "hgoa";
      return $this->hasMany('Estadia\Inciso','idPregunta');
    }
}
