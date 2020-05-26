<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competidor extends Model
{
    protected $table = 'competidores';
    protected $primaryKey = 'id_competidor';
    public $timestamps = false;
    protected $guarded = [];

    public function scopeActivos($query)
    {
        return $query->where('id_competidor','>', 0);
    }

    public function getTableColumns()
    {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
