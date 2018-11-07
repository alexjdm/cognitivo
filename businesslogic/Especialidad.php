<?php

require_once "models/Especialidad_DAO.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

class Especialidad {

    public function getEspecialidades(){

        $especialidadDao = new Especialidad_DAO();
        return $especialidadDao->getEspecialidades();
        
    }

}