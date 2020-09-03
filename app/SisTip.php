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

    public function scopeGraficas($query, $id_tip_pad)
    {
        $identificador = '';
        switch ($id_tip_pad) {
            case 1:
                $identificador = 'competidores.id_genero';
                break;
            case 4:
                $identificador = 'competidores.id_talla_jersey';
                break;
            case 13:
                $identificador = 'competidores.id_talla_calcetas';
                break;
            case 17:
                $identificador = 'competidores.id_distancia';
                break;
            case 20:
                $identificador = 'competidores.id_categoria';
                break;
            case 39:
                $identificador = 'competidores.id_tipo_sangre';
                break;
        }
        return $query->select(DB::raw("COUNT(*) as count"),'sis_tip.des','sis_tip.id_tip')
        ->leftjoin('competidores', 'sis_tip.id_tip', '=', $identificador)
        ->where('sis_tip.estatus', 1)->where('sis_tip.id_tip_pad', $id_tip_pad)->orWhere('sis_tip.id_tip', 0)
        ->groupBy('sis_tip.des','sis_tip.id_tip')
        ->orderBy('sis_tip.orden');
    }
}
