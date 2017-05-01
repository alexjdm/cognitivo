<?php
/**
 * Created by PhpStorm.
 * User: alexj
 * Date: 10-04-2016
 * Time: 17:34
 */

function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die();
}

function FormatearFechaSpa($fecha){
    $fechaSpa = split(' ', $fecha);
    list($año, $mes, $dia) = split('[/.-]', $fechaSpa[0]);
    $fechaSpa = $dia . "-" . $mes . "-" . $año;
    return $fechaSpa;
}

function FormatearFechaEn($fecha){
    $fechaEn = split(' ', $fecha);
    list($dia, $mes, $año) = split('[/.-]', $fechaEn[0]);
    $fechaEn = $año . "-" . $mes . "-" . $dia;
    return $fechaEn;
}

function FormatearFechaCompletaSpa($fecha){
    $fechaSpa = split(' ', $fecha);

    list($año, $mes, $dia) = split('[/.-]', $fechaSpa[0]);
    $fechaSpa = $dia . "-" . $mes . "-" . $año . " " . $fechaSpa[1];
        
    return $fechaSpa;
}

function FormatearMonto($monto){
    return number_format($monto, 0, ",", ".");
}