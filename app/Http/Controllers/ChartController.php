<?php

namespace App\Http\Controllers;

use DB;
use Charts;
use App\SisTip;
use App\Competidor;
use Illuminate\Http\Request;
use App\Charts\CompetidorChart;

class ChartController extends Controller
{
    public function index(){

        $javabar =  '(tooltipItem, data) => {
            let sum = 0;
            let value = data.datasets[0].data[tooltipItem.index];
            let dataArr = data.datasets[0].data;
            let label = data.labels[tooltipItem.index];
            dataArr.map(data => {
                sum += parseFloat(data);
            });
            let percentage = (value*100 / sum).toFixed(2)+"%";
            return " " + value + " - " + percentage;
        }';
        $java = '(tooltipItem, data) => {
            let sum = 0;
            let value = data.datasets[0].data[tooltipItem.index];
            let dataArr = data.datasets[0].data;
            let label = data.labels[tooltipItem.index];
            dataArr.map(data => {
                sum += parseFloat(data);
            });
            let percentage = (value*100 / sum).toFixed(2)+"%";
            return " " + label + " - "+ value + " - " + percentage;
        }';

        DB::statement("SET lc_time_names = 'es_MX'");
        //GRAFICAS DE BARRAS

        //Participantes por estado
        $estados = Competidor::select(DB::raw("COUNT(*) as count"),DB::raw("CASE estado WHEN '' THEN 'Sin Asignar' ELSE estado END AS edo"))->orderBy("estado")->groupBy('estado');
        $chart_estado = new CompetidorChart;
        $chart_estado->title('Participantes por Estado', 18);
        $chart_estado->labels($estados->pluck('edo'));
        $chart_estado->dataset(
            'Participantes por Estado',
            'bar',
            $estados->pluck('count'))->options(
                [
                    'fill' => 'true',
                    'backgroundColor' => '#FF9966'
                ]
        );

        //Edades de participantes
        $edades = Competidor::select(DB::raw("COUNT(*) as count"),'edad')->orderBy("edad")->groupBy('edad');
        $chart_edad = new CompetidorChart;
        $chart_edad->title('Edades de participantes', 18);
        $chart_edad->labels($edades->pluck('edad'));
        $chart_edad->dataset(
            'Edades de participantes',
            'bar',
            $edades->pluck('count'))->options(
                [
                    'fill' => 'true',
                    'backgroundColor' => '#FF9966'
                ]
        );

        //Participacion por categoria
        $categorias = SisTip::Graficas(20);
        $chart_categoria = new CompetidorChart;
        $chart_categoria->title('Participación de categorías', 18);
        $chart_categoria->labels($categorias->pluck('des'));
        $chart_categoria->dataset(
            'Participación por categorías',
            'bar',
            $categorias->pluck('count')
            )->options([
                    'fill' => 'true',
                    'backgroundColor' => '#FF9966'
        ]);

        //Cantidad de calcetas
        $calcetas = SisTip::Graficas(13);
        $chart_calcetas = new CompetidorChart;
        $chart_calcetas->title('Cantidad de calcetas', 18);
        $chart_calcetas->labels($calcetas->pluck('des'));
        $chart_calcetas->dataset(
            'Cantidad de calcetas',
            'bar',
            $calcetas->pluck('count')
            )->options([
                'fill' => 'true',
                'Color' => '#51C1C0',
                'backgroundColor' => '#FF9966'
        ]);

        //Cantidad de Jerseys
        $jerseys = SisTip::Graficas(4);
        $chart_jerseys = new CompetidorChart;
        $chart_jerseys->title('Cantidad de Jerseys', 18);
        $chart_jerseys->labels($jerseys->pluck('des'));
        $chart_jerseys->dataset(
            'Cantidad de Jerseys',
            'bar',
            $jerseys->pluck('count')
            )->options([
                'fill' => 'true',
                'backgroundColor' => '#FF9966'
        ]);

        //Historial de inscripciones
        $registro = Competidor::select(DB::raw('COUNT(*) as count'),DB::raw("DATE_FORMAT(fec_reg, '%b/%Y') as fecha"))
        ->groupBy(DB::raw('month(fec_reg)'))->oldest('fec_reg');
        $chart_registro = new CompetidorChart;
        $chart_registro->title('Historial de inscripciones', 18);
        $chart_registro->labels($registro->pluck('fecha'));
        $chart_registro->dataset('Historial de inscripciones', 'bar', $registro->pluck('count'))->options([
            'fill' => 'true',
            'backgroundColor' => '#FF9966'
        ]);

        //GRAFICAS DE DONA

        //Participacion de paquetes
        $paquete = Competidor::select(DB::raw("COUNT(*) as count"),DB::raw("REPLACE(obtenerProducto(id_evento),'PAQUETE ','') as paquete"))
        ->groupBy('id_evento')->orderBy('paquete');
        $chart_paquetes = new CompetidorChart;
        $chart_paquetes->title('Participación de paquetes', 18);
        $chart_paquetes->labels($paquete->pluck('paquete'));
        $chart_paquetes->dataset('Participación de paquetes', 'doughnut', $paquete->pluck('count'))->options([
            'fill' => 'true',
            'backgroundColor' =>  ['#8FAADC', '#FF9966'],

        ]);

        //Distancias seleccionadas
        $distancia = SisTip::Graficas(17);
        $chart_distancia = new CompetidorChart;
        $chart_distancia->title('Distancias seleccionadas', 18);
        $chart_distancia->labels($distancia->pluck('des'));
        $chart_distancia->dataset('Distancias seleccionadas', 'doughnut', $distancia->pluck('count'))->options([
            'fill' => 'true',
            'backgroundColor' =>  ['gray', '#8FAADC', '#FF9966'],
        ]);

        //Participacion por genero
        $genero = SisTip::Graficas(1);
        $chart_genero = new CompetidorChart;
        $chart_genero->title('Participación por género', 18);
        $chart_genero->labels($genero->pluck('des'));
        $chart_genero->dataset('Participación por género', 'doughnut', $genero->pluck('count'))->options([
            'fill' => 'true',
            'backgroundColor' =>  ['gray', '#8FAADC', '#FF9966'],
        ]);

        //    $chart_genero->options(['plugins' => '{
        //         "datalabels": {
        //             "formatter": (value, ctx) => {
        //                 let sum = 0;
        //                 let dataArr = ctx.chart.data.datasets[0].data;
        //                 dataArr.map(data => {
        //                     sum += parseFloat(data);
        //                 });
        //                 let percentage = (value*100 / sum).toFixed(2)+"%";
        //                 return percentage;
        //             }
        //         }
        //     }']);
       $chart_estado->options(['tooltips' => [
                'callbacks' => [
                    'label' => $chart_estado->rawObject($javabar)
                ]
            ]
        ]);
        $chart_edad->options(['tooltips' => [
                'callbacks' => [
                    'label' => $chart_edad->rawObject($javabar)
                ]
            ]
        ]);
        $chart_distancia->options(['tooltips' => [
                'callbacks' => [
                    'label' => $chart_distancia->rawObject($java)
                ]
            ]
        ]);
        $chart_genero->options(['tooltips' => [
                'callbacks' => [
                    'label' => $chart_genero->rawObject($java)
                ]
            ]
        ]);
        $chart_categoria->options(['tooltips' => [
                'callbacks' => [
                    'label' => $chart_categoria->rawObject($javabar)
                ]
            ]
        ]);
        $chart_paquetes->options(['tooltips' => [
                'callbacks' => [
                    'label' => $chart_paquetes->rawObject($java)
                ]
            ]
        ]);
        $chart_calcetas->options(['tooltips' => [
                'callbacks' => [
                    'label' => $chart_calcetas->rawObject($javabar)
                ]
            ]
        ]);
        $chart_jerseys->options(['tooltips' => [
                'callbacks' => [
                    'label' => $chart_jerseys->rawObject($javabar)
                ]
            ]
        ]);
        $chart_registro->options(['tooltips' => [
                'callbacks' => [
                    'label' => $chart_registro->rawObject($javabar)
                ]
            ]
        ]);


        return view('charts', compact('chart_estado', 'chart_edad', 'chart_distancia','chart_genero', 'chart_categoria', 'chart_paquetes', 'chart_calcetas', 'chart_jerseys', 'chart_registro'));
    }
}
