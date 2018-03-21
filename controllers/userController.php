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

    public function newuser() {
        $idPaciente = isset($_POST['idPaciente']) ? $_POST['idPaciente'] : null; // Se usa para asignar un apoderado a un paciente.
        $vista = isset($_POST['vista']) ? $_POST['vista'] : null;
        $addApoderado = isset($_POST['addApoderado']) ? $_POST['addApoderado'] : null;
        $especialidades = $this->modelE->getEspecialidades();

        require_once('views/admin/usuarios/newUser.php');
    }

    public function createnewuser() {
        $idPaciente = isset($_POST['idPaciente']) ? $_POST['idPaciente'] : null; // Se usa para asignar un apoderado a un paciente.
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : null;
        $especialidad = isset($_POST['especialidad']) ? $_POST['especialidad'] : null;
        $fechaNac = isset($_POST['fechaNac']) ? $_POST['fechaNac'] : null;
        $correo_electronico = isset($_POST['email']) ? $_POST['email'] : null;
        $telefono1 = isset($_POST['telefono1']) ? $_POST['telefono1'] : null;
        $telefono2 = isset($_POST['telefono2']) ? $_POST['telefono2'] : null;
        $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
        $perfil = isset($_POST['perfil']) ? $_POST['perfil'] : null;

        return $this->model->newUser($nombre, $apellido, $especialidad, $fechaNac, $correo_electronico, $telefono1, $telefono2, $direccion, $perfil, $idPaciente);
    }

    // Abrir vista para editar usuario
    public function userEdit() {
        $idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : null;
        $usuario = $this->model->getUser($idUsuario);
        $vista = isset($_POST['vista']) ? $_POST['vista'] : null;
        $addApoderado = isset($_POST['addApoderado']) ? $_POST['addApoderado'] : null;
        $especialidades = $this->modelE->getEspecialidades();

        require_once('views/usuarios/userEdit.php');
    }

    //Guardar en BD los datos del usuario
    public function editUser() {
        $idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : null;
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : null;
        $especialidad = isset($_POST['especialidad']) ? $_POST['especialidad'] : null;
        $fechaNac = isset($_POST['fecha']) ? $_POST['fecha'] : null;
        $correo_electronico = isset($_POST['email']) ? $_POST['email'] : null;
        $telefono1 = isset($_POST['telefono1']) ? $_POST['telefono1'] : null;
        $telefono2 = isset($_POST['telefono2']) ? $_POST['telefono2'] : null;
        $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
        $perfil = isset($_POST['perfil']) ? $_POST['perfil'] : null;

        return $this->model->editUser($idUsuario, $nombre, $apellido, $especialidad, $fechaNac, $correo_electronico, $telefono1, $telefono2, $direccion, $perfil);
    }

    //Guardar en BD los datos del usuario
    public function deleteUser() {
        $idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : null;

        return $this->model->deleteUser($idUsuario);
    }

    public function passwordUser() {
        $idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : null;
        require_once('views/usuarios/passwordUser.php');
    }

    //Guardar en BD los datos del usuario
    public function changePasswordUser() {
        $idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;

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