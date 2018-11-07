<?php

include_once("models/Usuario_DAO.php");
include_once("models/Especialidad_DAO.php");
include_once("models/Sesion_DAO.php");
include_once("helpers/CommonHelper.php");
include_once("helpers/SessionHelper.php");

class userController {

    public $model;
    public $modelE;
    public $modelS;

    public function __construct()
    {
        $this->model = new Usuario_DAO();
        $this->modelE = new Especialidad_DAO();
        $this->modelS = new Sesion_DAO();
    }

    public function index() {
        $usuarios = $this->model->getUsersList();
        require_once('views/usuarios/index.php');
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
        $this->page = 'views/admin/usuarios/profesionales.php';
        $controller = "user";
        $action = "profesionales";

        require_once( 'views/admin/Shared/layout.php' );
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
        $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : null;
        $idPaciente = isset($_POST['idPaciente']) ? $_POST['idPaciente'] : null;
        $idProfesional = isset($_POST['idProfesional']) ? $_POST['idProfesional'] : null;
        $numeroSesion = isset($_POST['numeroSesion']) ? $_POST['numeroSesion'] : null;
        $comentario = isset($_POST['comentario']) ? utf8_decode($_POST['comentario']) : null;

        return $this->modelS->newSesion($fecha, $idPaciente, $idProfesional, $numeroSesion, $comentario);
    }

    public function recalcularNumeroSesion() {
        $idPaciente = isset($_POST['idPaciente']) ? $_POST['idPaciente'] : null;
        $idProfesional = isset($_POST['idProfesional']) ? $_POST['idProfesional'] : null;

        return $this->modelS->recalcularNumeroSesion($idPaciente, $idProfesional);
    }

    public function sesionEdit() {
        $idSesion = isset($_POST['idSesion']) ? $_POST['idSesion'] : null;
        $sesion = $this->modelS->getSesion($idSesion);
        $pacientes = $this->model->getPacientes();
        $profesionales = $this->model->getProfesionales();
        require_once('views/usuarios/sesionEdit.php');
    }

    public function editSesion() {
        $idSesion = isset($_POST['idSesion']) ? $_POST['idSesion'] : null;
        $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : null;
        $idPaciente = isset($_POST['idPaciente']) ? $_POST['idPaciente'] : null;
        $idProfesional = isset($_POST['idProfesional']) ? $_POST['idProfesional'] : null;
        $numeroSesion = isset($_POST['numeroSesion']) ? $_POST['numeroSesion'] : null;
        $comentario = isset($_POST['comentario']) ? $_POST['comentario'] : null;

        return $this->modelS->editSesion($idSesion, $fecha, $idPaciente, $idProfesional, $numeroSesion, $comentario);
    }

    //Guardar en BD los datos del usuario
    public function deleteSesion() {
        $idSesion = isset($_POST['idSesion']) ? $_POST['idSesion'] : null;

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