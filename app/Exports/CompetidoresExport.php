<?php

namespace App\Exports;

use App\SisTip;
use App\Competidor;
use Maatwebsite\Excel\Concerns\FromCollection;

class CompetidoresExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Competidor::Activos()->map(function (Competidor $competidor) {
            return [
                'numero' => $competidor->id_competidor,
                'paquete' => $competidor->id_evento,
                'ticket' => $competidor->id_ticket,
                'fecha_registro' => $competidor->fec_reg,
                'nombre' => $competidor->nombre,
                'apellidos' => $competidor->apellidos,
                'estado' => $competidor->estado,
                'pais' => $competidor->pais,
                'correo' => $competidor->correo,
                'celular' => $competidor->celular,
                'otro_telefono' => $competidor->otr_tel,
                'fecha_nacimiento' => $competidor->fec_nacimiento,
                'lugar_nacimiento' => $competidor->lugar_nac,
                'edad' => $competidor->edad,
                'genero' => SisTip::find($competidor->id_genero)->des,
                'talla_jersey' => SisTip::find($competidor->id_talla_jersey)->des,
                'talla_calcetas' => SisTip::find($competidor->id_talla_calcetas)->des,
                'distancia' => SisTip::find($competidor->id_distancia)->des,
                'categoria' => SisTip::find($competidor->id_categoria)->des,
                'corral' => SisTip::find($competidor->id_corral)->des,
                'equipo' => $competidor->equipo,
                'contacto_emergencia' => $competidor->contacto_emerg,
                'telefono_emergencia' => $competidor->tel_emerg,
                'numero_personas' => $competidor->num_personas,
                'estatus' => ($competidor->estatus == 1 ? 'Sin Capturar' : ($competidor->estatus == 2 ? 'Capturado' : 'Sin Asignar'))
            ];
        });
    }
}
