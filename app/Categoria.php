<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	protected $table = 'categorias';

    protected $fillable = ['id', 'categoria', 'created_at', 'updated_at'];

    public function documentos()
    {
    	return $this->hasMany('App\Documento');
    }
}
