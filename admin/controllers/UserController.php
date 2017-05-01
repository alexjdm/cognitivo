<?php

include_once("models/UserModel.php");
include_once("models/EspecialidadModel.php");
include_once("models/SesionModel.php");
include_once("helpers/CommonHelper.php");
include_once("helpers/SessionHelper.php");

class UserController {

    public $model;
    public $modelE;
    public $modelS;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->modelE = new EspecialidadModel();
        $this->modelS = new SesionModel();
    }

    public function index() {
        $usuarios = $this->model->getUsersList();
        require_once('views/usuarios/index.php');
    }

    public function newUser() {
        $idPaciente = isset($_GET['idPaciente']) ? $_GET['idPaciente'] : null; // Se usa para asignar un apoderado a un paciente.
        $vista = isset($_GET['vista']) ? $_GET['vista'] : null;
        $addApoderado = isset($_GET['addApoderado']) ? $_GET['addApoderado'] : null;

        require_once('views/usuarios/newUser.php');
    }

    public function createNewUser() {
        $idPaciente = isset($_GET['idPaciente']) ? $_GET['idPaciente'] : null; // Se usa para asignar un apoderado a un paciente.
        $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : null;
        $apellido = isset($_GET['apellido']) ? $_GET['apellido'] : null;
        $especialidad = isset($_GET['especialidad']) ? $_GET['especialidad'] : null;
        $fechaNac = isset($_GET['fechaNac']) ? $_GET['fechaNac'] : null;
        $correo_electronico = isset($_GET['email']) ? $_GET['email'] : null;
        $telefono1 = isset($_GET['telefono1']) ? $_GET['telefono1'] : null;
        $telefono2 = isset($_GET['telefono2']) ? $_GET['telefono2'] : null;
        $direccion = isset($_GET['direccion']) ? $_GET['direccion'] : null;
        $perfil = isset($_GET['perfil']) ? $_GET['perfil'] : null;

        return $this->model->newUser($nombre, $apellido, $especialidad, $fechaNac, $correo_electronico, $telefono1, $telefono2, $direccion, $perfil, $idPaciente);
    }

    // Abrir vista para editar usuario
    public function userEdit() {
        $idUsuario = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : null;
        $usuario = $this->model->getUser($idUsuario);
        $vista = isset($_GET['vista']) ? $_GET['vista'] : null;
        $addApoderado = isset($_GET['addApoderado']) ? $_GET['addApoderado'] : null;
        $especialidades = $this->modelE->getEspecialidades();

        require_once('views/usuarios/userEdit.php');
    }

    //Guardar en BD los datos del usuario
    public function editUser() {
        $idUsuario = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : null;
        $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : null;
        $apellido = isset($_GET['apellido']) ? $_GET['apellido'] : null;
        $especialidad = isset($_GET['especialidad']) ? $_GET['especialidad'] : null;
        $fechaNac = isset($_GET['fecha']) ? $_GET['fecha'] : null;
        $correo_electronico = isset($_GET['email']) ? $_GET['email'] : null;
        $telefono1 = isset($_GET['telefono1']) ? $_GET['telefono1'] : null;
        $telefono2 = isset($_GET['telefono2']) ? $_GET['telefono2'] : null;
        $direccion = isset($_GET['direccion']) ? $_GET['direccion'] : null;
        $perfil = isset($_GET['perfil']) ? $_GET['perfil'] : null;

        return $this->model->editUser($idUsuario, $nombre, $apellido, $especialidad, $fechaNac, $correo_electronico, $telefono1, $telefono2, $direccion, $perfil);
    }

    //Guardar en BD los datos del usuario
    public function deleteUser() {
        $idUsuario = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : null;

        return $this->model->deleteUser($idUsuario);
    }

    public function passwordUser() {
        $idUsuario = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : null;
        require_once('views/usuarios/passwordUser.php');
    }

    //Guardar en BD los datos del usuario
    public function changePasswordUser() {
        $idUsuario = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : null;
        $password = isset($_GET['password']) ? $_GET['password'] : null;

        return $this->model->changePasswordUser($idUsuario, $password);
    }

    public function myPerfil() {
        require_once('views/usuarios/myPerfil.php');
    }

    public function fichas() {
        $pacientes = $this->model->getPacientes();
        $isSuperAdmin = isSuperAdmin();
        require_once('views/usuarios/fichas.php');
    }

    public function profesionales() {
        $usuarios = $this->model->getProfesionales();
        $especialidades = $this->modelE->getEspecialidades();
        $isSuperAdmin = isSuperAdmin();
        require_once('views/usuarios/profesionales.php');
    }

    public function sesiones() {
        $sesiones = $this->modelS->getSesiones();
        $pacientes = $this->model->getPacientes();
        $profesionales = $this->model->getProfesionales();
        $isSuperAdmin = isSuperAdmin();
        require_once('views/usuarios/sesiones.php');
    }

    public function newSesion() {
        $pacientes = $this->model->getPacientes();
        $profesionales = $this->model->getProfesionales();
        //$numeroSesion = $this->modelS->getNumeroSesion()[0] + 1;
        require_once('views/usuarios/newSesion.php');
    }

    public function createNewSesion() {
        $fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null;
        $idPaciente = isset($_GET['idPaciente']) ? $_GET['idPaciente'] : null;
        $idProfesional = isset($_GET['idProfesional']) ? $_GET['idProfesional'] : null;
        $numeroSesion = isset($_GET['numeroSesion']) ? $_GET['numeroSesion'] : null;
        $comentario = isset($_GET['comentario']) ? utf8_decode($_GET['comentario']) : null;

        return $this->modelS->newSesion($fecha, $idPaciente, $idProfesional, $numeroSesion, $comentario);
    }

    public function recalcularNumeroSesion() {
        $idPaciente = isset($_GET['idPaciente']) ? $_GET['idPaciente'] : null;
        $idProfesional = isset($_GET['idProfesional']) ? $_GET['idProfesional'] : null;

        return $this->modelS->recalcularNumeroSesion($idPaciente, $idProfesional);
    }

    public function sesionEdit() {
        $idSesion = isset($_GET['idSesion']) ? $_GET['idSesion'] : null;
        $sesion = $this->modelS->getSesion($idSesion);
        $pacientes = $this->model->getPacientes();
        $profesionales = $this->model->getProfesionales();
        require_once('views/usuarios/sesionEdit.php');
    }

    public function editSesion() {
        $idSesion = isset($_GET['idSesion']) ? $_GET['idSesion'] : null;
        $fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null;
        $idPaciente = isset($_GET['idPaciente']) ? $_GET['idPaciente'] : null;
        $idProfesional = isset($_GET['idProfesional']) ? $_GET['idProfesional'] : null;
        $numeroSesion = isset($_GET['numeroSesion']) ? $_GET['numeroSesion'] : null;
        $comentario = isset($_GET['comentario']) ? $_GET['comentario'] : null;

        return $this->modelS->editSesion($idSesion, $fecha, $idPaciente, $idProfesional, $numeroSesion, $comentario);
    }

    //Guardar en BD los datos del usuario
    public function deleteSesion() {
        $idSesion = isset($_GET['idSesion']) ? $_GET['idSesion'] : null;

        return $this->modelS->deleteSesion($idSesion);
    }

    public function contacto() {
        $pacientes = $this->model->getPacientes();
        $apoderados = $this->model->getApoderados();
        $paciente_apoderados = $this->model->getPacienteApoderado();
        require_once('views/usuarios/contacto.php');
    }

    public function error() {
        require_once('views/error/error.php');
    }
}
?>