<?php

use Illuminate\Support\Carbon;

return [
    'cards' => [
        [
            'headercard'=>'GRAN FONDO 500 VERACRUZ 2021',//.(Carbon::now()->add(1, 'year')->year),
            'attributes'=>
            [
                'nombre',
                'apellidos',
                'estado',
                'pais',
                'correo',
                'conf_correo',
                'celular',
                'otr_tel',
                'fec_nacimiento',
                'lugar_nac',
                'edad',
                'id_genero',
                'id_tipo_sangre',
                'alergias',
                'compania_seguros',
                'no_poliza',
               // 'c_terminos_condiciones',
            ],
        ],
        [
            'headercard'=>'INFORMACIÓN PARA COMPETENCIA',
            'attributes'=>
            [
                'id_talla_jersey',
                'id_talla_calcetas',
                'id_distancia',
                'id_categoria',
                'id_evento',
                'id_corral',
                'equipo',
                'num_personas',
                'contacto_emerg',
                'tel_emerg',
             ],
        ],
        [
            'headercard'=>'EXONERACIONES DE RESPONSABILIDAD',
            'attributes'=>
            [
                'c_reglamento',
            ],
        ],
        [
            'headercard'=>'JERSEY OBLIGATORIO',
            'attributes'=>
            [
                'c_jersey',
            ],
        ],
        [
            'headercard'=>'PROHIBICIÓN DE BICICLETAS DE TRIATLÓN',
            'attributes'=>
            [
                'c_bici_triatlon',
            ],
        ],
        [
            'headercard'=>'MENORES DE 15 AÑOS NO PUEDEN PARTICIPAR EN EL EVENTO',
            'attributes'=>
            [
                'c_menor_de',
            ],
        ],
       /* [
            'headercard'=>'TÉRMINOS Y CONDICIONES',
            'attributes'=>
            [
                'c_conformidad',
                'c_conocimiento',
            ],
        ],*/
    ],
    'infocheck' => [
        'c_terminos_condiciones'=>'Acepto términos y condiciones del reglamento así como del aviso de privacidad de GF500 AC.',
        'c_reglamento'=>'Declaro haber leído toda la información de la página del evento
        <a href="https://www.granfondo500.com/" target="_blank">www.granfondo500.com</a>,
        el <a href="http://deuxdemo.com/proyectos/granfondo/reglamento/" target="_blank">Reglamento</a>,
        los <a href="https://www.invextarjetas.com.mx/boletines/Carrera/Gran-Fondo-500.pdf" target="_blank">Términos y Condiciones</a>,
        así como el <a href="http://deuxdemo.com/proyectos/granfondo/wp-content/uploads/2020/05/aviso-de-privacidad.pdf" target="_blank">Aviso de Privacidad</a> y acepto todo lo establecido en los mismos.',
        'c_menor_de'=>'Entre 15 y 17 años el padre o tutor deberá de firmar la responsiva y recoger el paquete siendo responsable del menor de edad.',
        'c_conformidad'=>'Reitero mi conformidad en utilizar el jersey del evento al ser obligatorio, de lo contrario no podré participar sin derecho a reembolso alguno.',
        'c_conocimiento'=>'Reitero mi conocimiento y aceptación de que las bicicletas de triatlón y/o contra reloj están prohibidas.',
        'c_jersey'=>'Acepto usar el jersey del evento por ser obligatorio, de lo contrario seré expulsado sin derecho a reembolso alguno.',
        'c_bici_triatlon'=>'Acepto que las bicicletas de triatlón y/o contra reloj están prohibidas.',
    ],
    'card' => [
        [
            'headercard'=>'GRAN FONDO 500 VERACRUZ 2001',//.(Carbon::now()->add(1, 'year')->year),
            'attributes'=>
            [
                'nombre',
                'apellidos',
                'estado',
                'pais',
                'correo',
                'conf_correo',
                'celular',
                'otr_tel',
            ],
        ],
    ],
];
