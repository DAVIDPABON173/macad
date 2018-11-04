<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';

    protected $fillable = ['id', 'documento', 'prefijo', 'categoria_id', 'created_at', 'updated_at'];

    public function archivos()
    {
    	return $this->hasMany('App\Archivo');
    }
}
