<?php

namespace App\Http\Controllers;

use App\SisTip;
use App\Categoria;
use App\Competidor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Config;
use App\Http\Requests\UpdateCompetidorRequest;
use Barryvdh\DomPDF\PDF;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['registros','categorias','corral']);
    }


    public function index()
    {
        return view('home');
    }

    public function edit(Competidor $competidor)
    {
        $cards = ($competidor->id_evento == 4243 ? Config::get('granfondo.card') : Config::get('granfondo.cards'));
        $layout = 'layouts.app';
        $editar = true;
        return view('competidor',compact('competidor','cards','layout','editar'));
    }

    public function update(UpdateCompetidorRequest $request,Competidor $competidor)
    {
        try {
            //parent::Actualiza($request,$competidor->id_competidor);
            return redirect()->route('competidor',[EncryptCompetidor(parent::Actualiza($request,$competidor))])->with('success', 'Proceso de inscripción correcto.');
        } catch(\Exception $e) {
            return back()->withInput()->withErrors(array('message'=>$e->getMessage()));
        }
    }

    public function EnviarCorreo(Competidor $competidor)
    {
        try {
            parent::Enviar($competidor);
            return redirect()->route('competidor',[EncryptCompetidor($competidor)])->with('success', 'Mensaje enviado correctamente.');
        } catch(\Exception $e) {
            return back()->withErrors(array('message'=>$e->getMessage(),'correo'=>'Correo incorrecto'));
        }
    }

    public function EnviarCorreos($ids)
    {
        try {
            $result = json_decode($ids,true);
            parent::EnviarCorreos($result);
            return response()->json([
                'msj' => 'Mensaje(s) enviado(s) correctamente.'
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                'msj' =>$e->getMessage()
            ], 500);
        }
    }

    public function registros()
    {
        $all = Competidor::Activos()->get();

        $list = array();
        $k = 0;
        foreach ($all as $row) {
            $list[$k] = array(
                'state'=>false,
                'id'=>$row->id_competidor,
                'ticket'=>$row->id_ticket,
                'nombre'=>$row->nombre,
                'correo'=>$row->correo,
                'estatus'=> ($row->estatus == 1 ? 'Sin Capturar' : ($row->estatus == 2 ? 'Capturado' : 'Sin Asignar')),
                'id_link'=>'<a href="'.URL::route('competidor',[EncryptCompetidor($row)]).'" class="btn btn-outline-primary"  role="button" data-toggle="tooltip" data-placement="top" title="Ver Datos del Competidor">
                <i class="fas fa-file-alt"></i></a>'
            );
            $k++;
        }

        return $list;
    }

    public function categorias($id_genero,$id_distancia)
    {
        try {
            $categorias = Categoria::Categorias($id_genero,$id_distancia);
            return response()->json($categorias, 200);
        } catch(\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function corral($id_categoria,$vip)
    {
        try {
            if ($vip > 0) {
                $id_corral = 31;
            } else {
                switch ($id_categoria) {
                    case 21: // 15 - 17 / Juvenil
                        $id_corral = 32;
                        break;
                    case 22: // 18 - 39 / Libre
                        $id_corral = 31;
                        break;
                    case 23: // 40 - 44 / Master A
                        $id_corral = 33;
                        break;
                    case 24: // 45 - 49 / Master B
                        $id_corral = 34;
                        break;
                    case 25: // 50 - 54 / Master C
                        $id_corral = 35;
                        break;
                    case 26: // 55 - 59 / Master D
                        $id_corral = 36;
                        break;
                    case 27: // 60 - 64 / Master E
                    case 28: // 60 + / Master E
                        $id_corral = 37;
                        break;
                    case 29: // 65 + / Master F
                        $id_corral = 38;
                        break;
                    default:
                        $id_corral = 0;
                }
            }
            $corral = SisTip::find($id_corral);
            return response()->json($corral, 200);
        } catch(\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function pdfDownload(){
        set_time_limit(300);
        $pdf = app('dompdf.wrapper');

        $competidores = Competidor::Activos()->get();
        $html = '';

        foreach($competidores as $competidor)
        {
            $view = view('partials/vista-pdf')->with(compact('competidor'));
            $html .= $view->render();
        }
        $pdf = \PDF::loadHTML($html);
        $sheet = $pdf->setPaper('letter', 'portrait');

        return $sheet->download('competidores.pdf');  // $hours can not be accessed outside foreach. So changed the file name to `download.pdf`.
    }


}
