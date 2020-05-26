<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'vt_categorias';
    public $timestamps = false;
    public function scopeCategorias($query,$id_genero,$id_distancia)
    {
        return $query->where('id_genero',$id_genero)->where('id_distancia',$id_distancia)->orWhere('id_categoria', 0)->orderBy('orden')->get();
    }
}
