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

function sanear_string($string) {
    $string = trim($string);
    $string = str_replace( array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $string );
    $string = str_replace( array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $string );
    $string = str_replace( array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $string );
    $string = str_replace( array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $string );
    $string = str_replace( array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $string );
    $string = str_replace( array('ñ', 'Ñ', 'ç', 'Ç'), array('n', 'N', 'c', 'C',), $string );
    //Esta parte se encarga de eliminar cualquier caracter extraño
    $string = str_replace( array("\\", "¨", "º", "-", "~", "#", "@", "|", "!", "\"", "·", "$", "%", "&", "/", "(", ")", "?", "'", "¡", "¿", "[", "^", "`", "]", "+", "}", "{", "¨", "´", ">“, “< ", ";", ",", ":", "."), '', $string );
    return $string;
}

function getPuntosRut($rut){
    $rutTmp = explode( "-", $rut );
    return number_format( $rutTmp[0], 0, "", ".") . '-' . $rutTmp[1];
}