<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'registros';
    protected $primaryKey = 'id_registros';
    public $timestamps = false;
    protected $guarded = [];
}
