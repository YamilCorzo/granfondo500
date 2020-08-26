<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Charts\CompetidorChart;
use App\Competidor;
use Charts;
use DB;

class ChartController extends Controller
{
    public function index(){

        //GRAFICAS DE BARRAS

        //Participantes por estado
         $competidor_estado = Competidor::select(DB::raw("COUNT(*) as count"))//Objeto para llenar valores de la grafica
                    ->groupBy(DB::raw("estado"))
                    ->pluck('count'); 

                    $registros_estado = Competidor::select('estado')
                    ->groupBy('estado')
                    ->get();

                    $labels_estado = collect();
                    $cont = 0;
                    foreach ($registros_estado as $registro) {
                       $labels_estado->push($registro->estado);//Objeto para las etiquetas de la grafica
                    }

        $chart_estado = new CompetidorChart;
        $chart_estado->title('Participantes por Estado', 18);
        $chart_estado->labels($labels_estado);
        $chart_estado->dataset('Participantes por Estado', 'bar', $competidor_estado)->options([
            'fill' => 'true',
            'backgroundColor' => '#FF9966'
        ]);

        //Edades de participantes
        $competidor_edad = Competidor::select(DB::raw("COUNT(*) as count"))
        ->groupBy(DB::raw("edad"))
        ->pluck('count'); 

        $registros_edad = Competidor::select('edad')
        ->groupBy('edad')
        ->get();

        $labels_edad = collect();
        $cont = 0;
        foreach ($registros_edad as $registro) {
         $labels_edad->push($registro->edad);
        }

        $chart_edad = new CompetidorChart;
        $chart_edad->title('Edades de participantes', 18);
        $chart_edad->labels($labels_edad);
        $chart_edad->dataset('Edades de participantes', 'bar', $competidor_edad)->options([
            'fill' => 'true',
            'backgroundColor' => '#FF9966'
        ]);

     //Participacion por categoria
        $competidor_categoria = Competidor::select(DB::raw("COUNT(*) as count"))
        ->groupBy(DB::raw("id_categoria"))
        ->pluck('count');

        $chart_categoria = new CompetidorChart;
        $chart_categoria->title('Participación de categorías', 18);
        $chart_categoria->labels(['NA', 'Libre', 'Master A', 'Master B', 'Master C', 'Master D', 'Master E', 'Master E', 'Master F']);
        $chart_categoria->dataset('Participación por categorías', 'bar', $competidor_categoria)->options([
            'fill' => 'true',
            'backgroundColor' => '#FF9966'
        ]);

        //Cantidad de calcetas
        $competidor_calceta = Competidor::select(DB::raw("COUNT(*) as count"))
        ->groupBy(DB::raw("id_talla_calcetas"))
        ->pluck('count');

        $chart_calcetas = new CompetidorChart;
        $chart_calcetas->title('Cantidad de calcetas', 18);
        $chart_calcetas->labels(['#N/A','Small', 'Medium', 'Large']);
        $chart_calcetas->dataset('Cantidad de calcetas', 'bar', $competidor_calceta)->options([
            'fill' => 'true',
            'Color' => '#51C1C0',
            'backgroundColor' => '#FF9966'
        ]);

        //Cantidad de Jerseys

        $competidor_jersey = Competidor::select(DB::raw("COUNT(*) as count"))
                    ->groupBy(DB::raw("id_talla_jersey"))
                    ->pluck('count');

        $chart_jerseys = new CompetidorChart;
        $chart_jerseys->title('Cantidad de Jerseys', 18);
        $chart_jerseys->labels(['2XS','3XS', 'XS', 'XXL', 'S', 'M', 'XL', 'XL', '#N/A']);
        $chart_jerseys->dataset('Cantidad de Jerseys', 'bar', $competidor_jersey)->options([
            'fill' => 'true',
            'backgroundColor' => '#FF9966'
        ]);

        //Historial de inscripciones

         $competidor_registro = Competidor::select(DB::raw("COUNT(*) as count"))
        ->groupBy(\DB::raw("Month(fec_reg)"))
        ->oldest('fec_reg')
        ->pluck('count');

        $chart_registro = new CompetidorChart;
        $chart_registro->title('Historial de inscripciones', 18);
        $chart_registro->labels(['jul/2019','ago/2019', 'oct/2019', 'nov/2019', 'dic/2019', 'ene/2020', 'feb/2020', 'mar/2020', 'abr/2020', 'jun/2020']);
        $chart_registro->dataset('Historial de inscripciones', 'bar', $competidor_registro)->options([
            'fill' => 'true',
            'backgroundColor' => '#FF9966'
        ]); 

        //GRAFICAS DE DONA

        //Participacion de paquetes
        $competidor_paquete = Competidor::select(DB::raw("COUNT(*) as count"))
                    ->groupBy(DB::raw("vip"))
                    ->pluck('count');

        $chart_paquetes = new CompetidorChart;
        $chart_paquetes->title('Participación de paquetes', 18);
        $chart_paquetes->labels(['VIP','Estándar']);
        $chart_paquetes->dataset('Participación de paquetes', 'doughnut', $competidor_paquete)->options([
            'fill' => 'true',
            'backgroundColor' =>  ['#8FAADC', '#FF9966'],

        ]);

           //Distancias seleccionadas
            $competidor_distancia = Competidor::select(DB::raw("COUNT(*) as count"))
                    ->groupBy(DB::raw("id_distancia"))
                    ->pluck('count');

           $chart_distancia = new CompetidorChart;
           $chart_distancia->title('Distancias seleccionadas', 18);
           $chart_distancia->labels(['NA','Fondo completo', 'Medio fondo']);
           $chart_distancia->dataset('Distancias seleccionadas', 'doughnut', $competidor_distancia)->options([
               'fill' => 'true',
               'backgroundColor' =>  ['gray', '#8FAADC', '#FF9966'],
               ]);
   
           //Participacion por genero
            $competidor_genero = Competidor::select(DB::raw("COUNT(*) as count"))
           ->groupBy(DB::raw("id_genero"))
           ->pluck('count');
           
           $chart_genero = new CompetidorChart;
           $chart_genero->title('Participación por genero', 18);
           $chart_genero->labels(['NA', 'Femenil', 'Varonil']);
           $chart_genero->dataset('Participación por genero', 'doughnut', $competidor_genero)->options([
               'fill' => 'true',
               'backgroundColor' =>  ['gray', '#8FAADC', '#FF9966'],
           ]);

        
       // $chart = Charts::database($users, 'bar', 'highcharts');




        

        return view('charts', compact('chart_estado', 'chart_edad', 'chart_distancia','chart_genero', 'chart_categoria', 'chart_paquetes', 'chart_calcetas', 'chart_jerseys', 'chart_registro'));
    }
}
