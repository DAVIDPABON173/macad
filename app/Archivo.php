<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
	protected $table = 'archivos';

    protected $fillable = ['id', 'referencia', 'nombre', 'fecha', 'anio', 'descripcion', 'ubicacion_fisica', 'ruta', 'documento_id', 'created_at', 'updated_at'];
    
    public function documento()
	{
		return $this->belongsTo('App\Documento');
	}
}
