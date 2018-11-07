<?php

require_once "models/Detalle_DAO.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

class Detalle {

    public function getDetalle($fechaInicio, $fechaFin){
        $detalleDao = new Detalle_DAO();
        return $detalleDao->getDetalle($fechaInicio, $fechaFin);
    }

}