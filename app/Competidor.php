<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;

class Competidor extends Model
{
    protected $table = 'competidores';
    protected $primaryKey = 'id_competidor';
    public $timestamps = false;
    protected $guarded = [];

    public function scopeActivos($query)
    {
        return $query->where('id_competidor','>', 0)->whereIn('estatus', [1,2]);
    }

    public function getTableColumns()
    {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }


    public function Genero()
    {
        return SisTip::find($this->id_genero)->des;
    }

    public function Jersey()
    {
        return SisTip::find($this->id_talla_jersey)->des;
    }

    public function Calcetas()
    {
        return SisTip::find($this->id_talla_calcetas)->des;
    }

    public function Distancia()
    {
        return SisTip::find($this->id_distancia)->des;
    }

    public function Categoria()
    {
        return SisTip::find($this->id_categoria)->des;
    }

    public function Corral()
    {
        return SisTip::find($this->id_corral)->des;
    }

    public function FechaLargaAct()
    {
        $carbon = new Carbon($this->fec_act);
        return $carbon->isoFormat('dddd DD \\d\\e MMMM \\d\\e\\l YYYY, h:mm A');
    }

    public function FechaLargaReg()
    {
        $carbon = new Carbon($this->fec_reg);
        return $carbon->isoFormat('dddd DD \\d\\e MMMM \\d\\e\\l YYYY, h:mm A');
    }
    public function TipoDeSangre()
    {
        return SisTip::find($this->id_tipo_sangre)->des;
    }


}
