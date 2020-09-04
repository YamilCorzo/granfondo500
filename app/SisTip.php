<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class SisTip extends Model
{
    protected $table = 'sis_tip';
    protected $primaryKey = 'id_tip';
    public $timestamps = false;

    public function scopeSisTipDet($query, $ids)
    {
        return $query->where('estatus', 1)->whereIn('id_tip', $ids)->orderBy('orden')->get();
    }

    public function scopeSisTipDetPad($query, $id_tip_pad)
    {
        return $query->where('estatus', 1)->where('id_tip_pad', $id_tip_pad)->orderBy('orden')->get();
    }

    public function scopeSisTipDetPadCero($query, $id_tip_pad)
    {
        return $query->where('estatus', 1)->where('id_tip_pad', $id_tip_pad)->orWhere('id_tip', 0)->orderBy('orden')->get();
    }

    public function scopeGraficas($query, $grafica)
    {
        $identificador = '';
        $id_tip_pad = 0;

        switch ($grafica) {
            case 'categorias':
                $identificador = 'competidores.id_categoria';
                $id_tip_pad = 20;
            break;
            case 'calcetas':
                $identificador = 'competidores.id_talla_calcetas';
                $id_tip_pad = 13;
            break;
            case 'jerseys':
                $identificador = 'competidores.id_talla_jersey';
                $id_tip_pad = 4;
            break;
            case 'distancias':
                $identificador = 'competidores.id_distancia';
                $id_tip_pad = 17;
            break;
            case 'generos':
                $identificador = 'competidores.id_genero';
                $id_tip_pad = 1;
            break;
        }

        return $query->select(DB::raw("COUNT(*) as count"),'sis_tip.des','sis_tip.id_tip')
        ->leftjoin('competidores', 'sis_tip.id_tip', '=', $identificador)
        ->where('sis_tip.estatus', 1)->where('sis_tip.id_tip_pad', $id_tip_pad)->orWhere('sis_tip.id_tip', 0)
        ->groupBy('sis_tip.des','sis_tip.id_tip')
        ->orderBy('sis_tip.orden');
    }
}
