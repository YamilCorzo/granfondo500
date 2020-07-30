<?php

namespace App\Exports;

use App\SisTip;
use App\Competidor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class CompetidoresExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Competidor::Activos()->get()->map(function (Competidor $competidor) {
            return [
                $competidor->id_competidor,
                GetProducto($competidor->id_evento),
                $competidor->id_ticket,
                $competidor->fec_reg,
                $competidor->nombre,
                $competidor->apellidos,
                $competidor->estado,
                $competidor->pais,
                $competidor->correo,
                $competidor->celular,
                $competidor->otr_tel,
                $competidor->fec_nacimiento,
                $competidor->lugar_nac,
                $competidor->edad,
                SisTip::find($competidor->id_genero)->des,
                SisTip::find($competidor->id_talla_jersey)->des,
                SisTip::find($competidor->id_talla_calcetas)->des,
                SisTip::find($competidor->id_distancia)->des,
                SisTip::find($competidor->id_categoria)->des,
                SisTip::find($competidor->id_corral)->des,
                $competidor->equipo,
                $competidor->contacto_emerg,
                $competidor->tel_emerg,
                $competidor->num_personas,
                ($competidor->estatus == 1 ? 'Sin Capturar' : ($competidor->estatus == 2 ? 'Capturado' : 'Sin Asignar'))
            ];
        });
    }

    public function headings() :array
    {
        return [
            'Número',
            'Paquete',
            'Ticket',
            'Fecha de registro',
            'Nombre',
            'Apellidos',
            'Estado',
            'País',
            'Correo',
            'Celular',
            'Otro teléfono',
            'Fecha de nacimiento',
            'Lugar de nacimiento',
            'Edad',
            'Género',
            'Talla de jersey',
            'Talla de calcetas',
            'Distancia',
            'Categoría',
            'Corral',
            'Equipo',
            'Contacto de emergencia',
            'Teléfono de emergencia',
            'Número de personas',
            'Estatus',
        ];
    }
}
