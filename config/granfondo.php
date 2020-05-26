<?php
return [
    'cards' => [
        [
            'headercard'=>'DATOS PERSONALES',
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
                'c_terminos_condiciones',
            ],
        ],
        [
            'headercard'=>'INFORMACIÓN PARA EVENTO',
            'attributes'=>
            [
                'id_talla_jersey',
                'id_talla_calcetas',
                'id_distancia',
                'id_categoria',
                'id_corral',
                'equipo',
                'contacto_emerg',
                'tel_emerg',
                'num_personas',
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
            'headercard'=>'MENORES DE 15 AÑOS: NO PUEDEN PARTICIPAR EN EL EVENTO',
            'attributes'=>
            [
                'c_menor_de',
            ],
        ],
        [
            'headercard'=>'TÉRMINOS Y CONDICIONES',
            'attributes'=>
            [
                'c_conformidad',
                'c_conocimiento',
            ],
        ],
    ],
    'infocheck' => [
        'c_terminos_condiciones'=>'Acepto términos y condiciones del reglamento así como del aviso de privacidad de GF500 AC.',
        'c_reglamento'=>'Reitero que he leído y estoy de acuerdo con el reglamento del evento por lo que deslindo de cualquier tipo de responsabilidad, civil, penal, laboral o de cualquier otra índole a GF500 AC., Gran Fondo 500,  gran fondo 500 Veracruz, Eddy´s Bikes,  sus representantes, socios, asociados, patrocinadores, proveedores, aliados y cualquier otro relacionado con el evento.',
        'c_menor_de'=>'Entre 15 y 17 años: el padre o tutor deberá de firmar la responsiva y recoger el paquete siendo responsable del menor de edad.',
        'c_conformidad'=>'Reitero mi conformidad en utilizar el jersey del evento al ser obligatorio, de lo contrario no podré participar sin derecho a reembolso alguno.',
        'c_conocimiento'=>'Reitero mi conocimiento y aceptación de que las bicicletas de triatlón y/o contra reloj están prohibidas.',
    ],
];
