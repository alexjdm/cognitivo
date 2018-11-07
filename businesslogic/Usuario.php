<?php

require_once "models/Usuario_DAO.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

class Usuario {

    public function getProfesionales(){
        $usuarioDao = new Usuario_DAO();
        return $usuarioDao->getProfesionales();
    }

    public function getPacientes(){
        $usuarioDao = new Usuario_DAO();
        return $usuarioDao->getPacientes();
    }

    public function getUser($idUsuario) {
        $usuarioDao = new Usuario_DAO();
        return $usuarioDao->getUser($idUsuario);
    }

    public function deleteUser($idUsuario) {
        $usuarioDao = new Usuario_DAO();
        $usuarioDao->deleteUser($idUsuario);
    }

    public function editUser($idUsuario, $nombre, $apellido, $idEspecialidad, $fechaNac, $correoElectronico, $telefono1, $telefono2, $direccion, $perfil) {
        $usuarioDao = new Usuario_DAO();
        $usuarioDao->editUser($idUsuario, $nombre, $apellido, $idEspecialidad, $fechaNac, $correoElectronico, $telefono1, $telefono2, $direccion, $perfil);
    }

    public function changePasswordUser($idUsuario, $password) {
        $usuarioDao = new Usuario_DAO();
        $usuarioDao->changePasswordUser($idUsuario, $password);
    }

    public function newUser($nombre, $apellido, $idEspecialidad, $fechaNac, $correoElectronico, $telefono1, $telefono2, $direccion, $perfil, $idPaciente) {
        $usuarioDao = new Usuario_DAO();
        $usuarioDao->newUser($nombre, $apellido, $idEspecialidad, $fechaNac, $correoElectronico, $telefono1, $telefono2, $direccion, $perfil, $idPaciente);
    }

}