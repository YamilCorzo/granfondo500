<?php

namespace App\Http\Controllers;

use App\Competidor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Config;
use App\Http\Requests\CreateCompetidorRequest;
use App\Http\Requests\UpdateCompetidorRequest;

class CompetidoresController extends Controller
{
    public function store(CreateCompetidorRequest $request)
    {
        $id_registros = parent::registro(json_encode($request->all()),'1');
        try {
                $id_corral = ($request->get('vip') == 1 ? 31 : 0);
                $competidor = Competidor::create([
                'id_evento' => $request->get('id_evento'),
                'id_ticket' => $request->get('id_ticket'),
                'id_usuario' => $request->get('id_usuario'),
                'vip' => $request->get('vip'),
                'fec_reg' => Carbon::now(),
                'nombre' => $request->get('nombre'),
                'correo' => $request->get('correo'),
                'id_corral' => $id_corral,
                'estatus' => 1
                ]);
                parent::Enviar($competidor);
                parent::registro($competidor,'201',$id_registros,$competidor->id_competidor);
                return response()->json('Mensaje enviado correctamente.', 201);
         } catch(\Exception $e) {
            parent::registro($e->getMessage(),'500',$id_registros);
            return response()->json($e->getMessage(), 500);
         }
    }

    public function update(UpdateCompetidorRequest $request,Competidor $competidor)
    {
        try {
            parent::Actualiza($request,$competidor);
            return redirect()->route('competidor',[EncryptCompetidor($competidor)])->with('success', 'Proceso de inscripción correcto.');
        } catch(\Exception $e) {
            return back()->withInput()->withErrors(array('message'=>$e->getMessage()));
        }
    }

    public function edit(Competidor $competidor)
    {
        $cards = Config::get('granfondo.cards');
        if($competidor->estatus == 2) {
            $editar = false;
        } else {
            $editar = true;
        }
        $layout = 'layouts.formulario';
        return view('competidor',compact('competidor','cards','layout','editar'));
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return Competidor::all();
        } catch(\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Competidor  $competidor
     * @return \Illuminate\Http\Response
     */
    public function show(Competidor $competidor)
    {
        try {
            return $competidor;
        } catch(\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    // public function update(Request $request, Competidor $competidor)
    // {
    //     try {
    //         $competidor->update($request->all());
    //         return response()->json($competidor, 200);
    //     } catch(\Exception $e) {
    //         return response()->json($e->getMessage(), 500);
    //     }
    // }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Competidor  $competidor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competidor $competidor)
    {
        try {
            $competidor->delete();
            return response()->json(null, 204);
        } catch(\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }

    }
}
