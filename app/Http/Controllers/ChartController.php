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
    public function index()
    {
        //GRAFICAS DE BARRAS
        //Participantes por estado
        $chart_estado = $this->CreateChart('estados','bar');
        //Edades de participantes
        $chart_edad = $this->CreateChart('edades','bar');
        //Participacion por categoria
        $chart_categoria = $this->CreateChart('categorias','bar');
        //Cantidad de calcetas
        $chart_calcetas = $this->CreateChart('calcetas','bar');
        //Cantidad de Jerseys
        $chart_jerseys = $this->CreateChart('jerseys','bar');
        //Historial de inscripciones
        $chart_registro =  $this->CreateChart('registros','bar');

        //GRAFICAS DE DONA
        //Participacion de paquetes
        $chart_paquetes =  $this->CreateChart('paquetes','doughnut');
        //Distancias seleccionadas
        $chart_distancia = $this->CreateChart('distancias','doughnut');
        //Participacion por genero
        $chart_genero = $this->CreateChart('generos','doughnut');

        return view('charts', compact('chart_estado', 'chart_edad', 'chart_distancia','chart_genero', 'chart_categoria', 'chart_paquetes', 'chart_calcetas', 'chart_jerseys', 'chart_registro'));
    }

    private function CreateChart($grafica,$tipo)
    {
        DB::statement("SET lc_time_names = 'es_MX'");

        $chart = new CompetidorChart;
        $data = null;
        $title = null;
        $backgroundColor = '#FF9966';

        switch ($grafica) {
            case 'estados':
                $data = Competidor::Graficas($grafica);
                $title = 'Participantes por Estado';
            break;
            case 'edades':
                $data = Competidor::Graficas($grafica);
                $title = 'Edades de participantes';
            break;
            case 'categorias':
                $data = SisTip::Graficas($grafica);
                $title = 'Participación de categorías';
            break;
            case 'calcetas':
                $data = SisTip::Graficas($grafica);
                $title = 'Cantidad de calcetas';
            break;
            case 'jerseys':
                $data = SisTip::Graficas($grafica);
                $title = 'Cantidad de Jerseys';
            break;
            case 'registros':
                $data = Competidor::Graficas($grafica);
                $title = 'Historial de inscripciones';
            break;
            case 'paquetes':
                $data = Competidor::Graficas($grafica);
                $title = 'Participación de paquetes';
                $backgroundColor = ['#8FAADC', '#FF9966'];
            break;
            case 'distancias':
                $data = SisTip::Graficas($grafica);
                $title = 'Distancias seleccionadas';
                $backgroundColor = ['gray', '#8FAADC', '#FF9966'];
            break;
            case 'generos':
                $data = SisTip::Graficas($grafica);
                $title = 'Participación por género';
                $backgroundColor = ['gray', '#8FAADC', '#FF9966'];
            break;
        }

        $chart->title($title, 18);
        $chart->labels($data->pluck('des'));
        $chart->dataset(
            $title,
            $tipo,
            $data->pluck('count'))->options(
                [
                    'fill' => 'true',
                    'backgroundColor' => $backgroundColor
                ]
        );
        $chart->options(['tooltips' => [
                'callbacks' => [
                    'label' => $chart->rawObject($this->ToolTip($tipo))
                ]
            ]
        ]);

        //    $chart->options(['plugins' => '{
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

        return $chart;
    }

    private function ToolTip($tipo){
        $texto = '';
        if ($tipo == 'bar') {
            $texto = 'return " " + value + " - " + percentage;';
        } else {
            $texto = 'return " " + label + " - "+ value + " - " + percentage;';
        }
        return '(tooltipItem, data) => {
            let sum = 0;
            let value = data.datasets[0].data[tooltipItem.index];
            let dataArr = data.datasets[0].data;
            let label = data.labels[tooltipItem.index];
            dataArr.map(data => {
                sum += parseFloat(data);
            });
            let percentage = (value*100 / sum).toFixed(2)+"%";
            '.$texto.'
        }';
    }
}
