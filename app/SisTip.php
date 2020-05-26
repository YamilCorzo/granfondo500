<?php

namespace App;

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
}
