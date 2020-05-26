<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Competidor;
use Illuminate\Support\Carbon;
use App\Mail\MensajeRecibido;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Mail\EnviarPass;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function Actualiza($request,Competidor $competidor)
    {
        $competidor->update([
            'fec_act' => Carbon::now(),
            'nombre' => $request->input('nombre'),
            'apellidos' => $request->input('apellidos'),
            'estado' => $request->input('estado'),
            'pais' => $request->input('pais'),
            'correo' => $request->input('correo'),
            'conf_correo' => $request->input('conf_correo'),
            'celular' => $request->input('celular'),
            'otr_tel' => ($request->has('otr_tel')) ? $request->input('otr_tel') : '',
            'fec_nacimiento' => $request->input('fec_nacimiento'),
            'lugar_nac' => $request->input('lugar_nac'),
            'edad' => $request->input('edad'),
            'id_genero' => $request->input('id_genero'),
            'c_terminos_condiciones' => ($request->has('c_terminos_condiciones')) ? 1 : 0,
            'id_talla_jersey' => $request->input('id_talla_jersey'),
            'id_talla_calcetas' => $request->input('id_talla_calcetas'),
            'id_distancia' => $request->input('id_distancia'),
            'id_categoria' => $request->input('id_categoria'),
            'id_corral' => $request->input('id_corral'),
            'equipo' => ($request->has('equipo')) ? $request->input('equipo') : '',
            'contacto_emerg' => $request->input('contacto_emerg'),
            'tel_emerg' => $request->input('tel_emerg'),
            'num_personas' => $request->input('num_personas'),
            'c_reglamento' => ($request->has('c_reglamento')) ? 1 : 0,
            'c_menor_de' => ($request->has('c_menor_de')) ? 1 : 0,
            'c_conformidad' => ($request->has('c_conformidad')) ? 1 : 0,
            'c_conocimiento' => ($request->has('c_conocimiento')) ? 1 : 0,
            'estatus' => 2,
            ]);
    }

    public function EnviarCorreos($ids)
    {
        $competidor = Competidor::find($ids);
        if ($competidor->isEmpty()) {
            $this->Enviar($competidor);
        } else {
            foreach ($competidor as $row) {
                $this->Enviar($row);
            }
        }
    }

    public function Enviar(Competidor $competidor)
    {
        Mail::to($competidor->correo)->queue(new MensajeRecibido($competidor));
    }

    public function UsuarioPass(User $user,$password)
    {
        Mail::to($user->email)->queue(new EnviarPass($user,$password));
    }
}
