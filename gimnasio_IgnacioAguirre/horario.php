<?php 
//horario.php

$_SESSION['clasesh']=[
    'yoga'=>[
        'lunes'=>[
            'hora'=>'19:00',
            'plazas_totales'=>20,
            'plazas_disponibles'=>20,
            'plazas_reservadas'=>0,
            'reservado'=>0
        ],
        'miércoles'=>[
            'hora'=>'08:00',
            'plazas_totales'=>20,
            'plazas_disponibles'=>20,
            'plazas_reservadas'=>0,
            'reservado'=>0
        ],
        'viernes'=>[
            'hora'=>'10:00',
            'plazas_totales'=>20,
            'plazas_disponibles'=>20,
            'plazas_reservadas'=>0,
            'reservado'=>0
        ]
    ],
    'zumba'=>[
        'martes'=>[
            'hora'=>'18:00',
            'plazas_totales'=>20,
            'plazas_disponibles'=>20,
            'plazas_reservadas'=>0,
            'reservado'=>0
        ],
        'miércoles'=>[
            'hora'=>'19:30',
            'plazas_totales'=>20,
            'plazas_disponibles'=>20,
            'plazas_reservadas'=>0,
            'reservado'=>0
        ]
    ],
    'crossfit'=>[
        'lunes'=>[
            'hora'=>'18:00',
            'plazas_totales'=>20,
            'plazas_disponibles'=>20,
            'plazas_reservadas'=>0,
            'reservado'=>0
        ],
        'miércoles'=>[
            'hora'=>'14:30',
            'plazas_totales'=>20,
            'plazas_disponibles'=>20,
            'plazas_reservadas'=>0,
            'reservado'=>0
        ],
        'viernes'=>[
            'hora'=>'20:30',
            'plazas_totales'=>20,
            'plazas_disponibles'=>20,
            'plazas_reservadas'=>0,
            'reservado'=>0
        ]
    ]

        ];
        //$clasesh = $GLOBALS;
function liberar_plaza($actividad, $dia){
    if (!$_SESSION['clasesh'][$actividad][$dia]['reservado']){
    $_SESSION['clasesh'][$actividad][$dia]['plazas_disponibles']++;
    $_SESSION['clasesh'][$actividad][$dia]['plazas_reservadas']--;
    $_SESSION['clasesh'][$actividad][$dia]['reservado']=1;
    return true;
    }
    return false;
}
function reservar_plaza($actividad, $dia) {
    if ($_SESSION['clasesh'][$actividad][$dia]['reservado']){
        $_SESSION['clasesh'][$actividad][$dia]['plazas_disponibles']--;
        $_SESSION['clasesh'][$actividad][$dia]['plazas_reservadas']++;
        $_SESSION['clasesh'][$actividad][$dia]['reservado']=0;
        return true;
    }
    return false;
}
?>