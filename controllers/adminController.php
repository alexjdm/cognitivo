<?php

require_once "models/Curso_DAO.php";
require_once "businesslogic/Curso.php";
require_once "businesslogic/Usuario.php";
require_once "businesslogic/Detalle.php";
require_once "businesslogic/Especialidad.php";
include_once("helpers/SessionHelper.php");

class adminController {

    public $pageTitle = "Cognitivo Centro de Terapias";
    public $pageDescription = "Centro de terapia especialista en Autismo. Contamos con especialidades en Fonoaudiología, Terapia Ocupacional, Psicología y Psicopedagogía.";
    public $page = 'views/home/index.php';
    public $navbar = 'navbar.php';
    public $navbarfooter = 'navbar-footer.php';

    public function home() {
        $this->pageTitle = "Cognitivo Centro de Terapias";
        $this->pageDescription = "Centro de terapia especialista en Autismo. Contamos con especialidades en Fonoaudiología, Terapia Ocupacional, Psicología y Psicopedagogía.";
        $this->page = 'views/admin/home/index.php';
        $controller = "admin";
        $action = "home";
        $this->pageKeywords = 'centro de autismo, TEA, Fonoaudiología,Psicología,Psicopedagogía,centro de Terapia Ocupacional, centro de Terapia Ocupacional para niños';
		
        require_once( 'views/admin/Shared/layout.php' );
    }

    /// REGION CURSOS

    public function cursos() {

        $this->pageTitle = "Cognitivo Centro de Terapias";
        $this->pageDescription = "Centro de terapia especialista en Autismo. Contamos con especialidades en Fonoaudiología, Terapia Ocupacional, Psicología y Psicopedagogía.";
        $this->pageKeywords = 'centro de autismo, TEA, Fonoaudiología,Psicología,Psicopedagogía,centro de Terapia Ocupacional, centro de Terapia Ocupacional para niños';
        $this->page = 'views/admin/cursos/index.php';
        $controller = "admin";
        $action = "cursos";

        $cursoDao = new Curso_DAO();
        $cursos = $cursoDao->getCursosList();

        require_once( 'views/admin/Shared/layout.php' );
    }

    public function pagados() {
        $idCurso = isset($_POST['idCurso']) ? $_POST['idCurso'] : null;
        if($idCurso == null)
            $idCurso = isset($_GET['idCurso']) ? $_GET['idCurso'] : null;

        $cursoDao = new Curso_DAO();
        $curso = $cursoDao->getCurso($idCurso);
        $pagados = $cursoDao->getPagados($idCurso);
        $pendientes = $cursoDao->getPendientes($idCurso);
        $recaudacion = $cursoDao->getRecaudacion($idCurso);

        $fecha = $curso['FECHA_CURSO'];
        $segundos = strtotime($fecha) - strtotime('now');
        $diferencia_dias = intval($segundos/60/60/24);

        $this->page = 'views/admin/cursos/pagados.php';
        $controller = "admin";
        $action = "pagados";

        require_once( 'views/admin/Shared/layout.php' );
    }

    public function enviarCorreoConfirmacionPagados()
    {
        $idCurso = isset($_POST['idCurso']) ? $_POST['idCurso'] : null;
        if($idCurso == null)
            $idCurso = isset($_GET['idCurso']) ? $_GET['idCurso'] : null;

        $cursoDao = new Curso_DAO();
        $curso = $cursoDao->getCurso($idCurso);
        $pagadosSinConfirmar = $cursoDao->getPagadosSinConfirmacion($idCurso);

        $this->page = 'views/admin/cursos/pagados.php';
        $controller = "admin";
        $action = "pagados";

        require_once( 'views/admin/Shared/layout.php' );
    }

    public function inscritos() {
        $idCurso = isset($_POST['idCurso']) ? $_POST['idCurso'] : null;
        if($idCurso == null)
            $idCurso = isset($_GET['idCurso']) ? $_GET['idCurso'] : null;

        $cursoDao = new Curso_DAO();
        $curso = $cursoDao->getCurso($idCurso);
        $inscritos = $cursoDao->getInscritos($idCurso);
        $this->page = 'views/admin/cursos/inscritos.php';
        $controller = "admin";
        $action = "inscritos";

        require_once( 'views/admin/Shared/layout.php' );
    }

    public function inscritodetalle() {
        $idInscrito = isset($_POST['idInscrito']) ? $_POST['idInscrito'] : null;

        $cursoDao = new Curso_DAO();
        $inscrito = $cursoDao->getInscrito($idInscrito);

        require_once('views/admin/cursos/inscritoDetalle.php');
    }

    public function updateinscrito() {
        $idInscrito = isset($_POST['idInscrito']) ? $_POST['idInscrito'] : null;
        $pago = isset($_POST['pago']) ? $_POST['pago'] : null;
        if($pago == "true"){
            $pago = 1;
        } else {
            $pago = 0;
        }
        $llamado = isset($_POST['llamado']) ? $_POST['llamado'] : null;
        if($llamado == "true"){
            $llamado = 1;
        } else {
            $llamado = 0;
        }
        $confirmacion = isset($_POST['confirmacion']) ? $_POST['confirmacion'] : null;
        if($confirmacion == "true"){
            $confirmacion = 1;
        } else {
            $confirmacion = 0;
        }
        $comentario = isset($_POST['comentario']) ? $_POST['comentario'] : null;

        $cursoDao = new Curso_DAO();
        return $cursoDao->updateInscrito($idInscrito, $pago, $llamado, $confirmacion, $comentario);
    }

    public function createnewcurso() {
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : null;
        if(isset($_GET['fecha'])){
            list($dia, $mes, $año) = split('[/.-]', $fecha);
            $fecha = $año . "-" . $mes . "-" . $dia;
        }

        $cursoDao = new Curso_DAO();
        return $cursoDao->newCurso($nombre, $fecha);
    }

    public function cursoedit() {
        $idCurso = isset($_POST['idCurso']) ? $_POST['idCurso'] : null;

        $cursoDao = new Curso_DAO();
        $curso = $cursoDao->getCurso($idCurso);
        require_once('views/admin/cursos/cursoEdit.php');
    }

    //Guardar en BD los datos del usuario
    public function editcurso() {
        $idCurso = isset($_POST['idCurso']) ? $_POST['idCurso'] : null;
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : null;
        if(isset($_POST['fecha'])){
            list($dia, $mes, $año) = split('[/.-]', $fecha);
            $fecha = $año . "-" . $mes . "-" . $dia;
        }

        $cursoDao = new Curso_DAO();
        return $cursoDao->editCurso($idCurso, $nombre, $fecha);
    }

    public function deletecurso() {
        $idCurso = isset($_POST['idCurso']) ? $_POST['idCurso'] : null;

        $cursoDao = new Curso_DAO();
        return $cursoDao->deleteCurso($idCurso);
    }

    public function deleteinscrito() {
        $idInscrito = isset($_POST['idInscrito']) ? $_POST['idInscrito'] : null;

        $cursoDao = new Curso_DAO();
        return $cursoDao->deleteInscrito($idInscrito);
    }

    public function enviarcorreoconfirmacion() {
        $idInscrito = isset($_POST['idInscrito']) ? $_POST['idInscrito'] : null;

        $cursoBusiness = new Curso();
        return $cursoBusiness->enviarCorreoConfirmacion($idInscrito);
    }

    public function enviarcorreomasivo() {

        $cursoBusiness = new Curso();
        return $cursoBusiness->enviarCorreoMasivo();
    }

    /// REGION CURSOS


    /// REGION PROFESIONALES

    public function profesionales() {

        $this->pageTitle = "Cognitivo Centro de Terapias";
        $this->pageDescription = "Centro de terapia especialista en Autismo. Contamos con especialidades en Fonoaudiología, Terapia Ocupacional, Psicología y Psicopedagogía.";
        $this->pageKeywords = 'centro de autismo, TEA, Fonoaudiología,Psicología,Psicopedagogía,centro de Terapia Ocupacional, centro de Terapia Ocupacional para niños';
        $this->page = 'views/admin/usuarios/profesionales.php';
        $controller = "admin";
        $action = "profesionales";

        $isSuperAdmin = isSuperAdmin();

        $usuarioBusiness = new Usuario();
        $usuarios = $usuarioBusiness->getProfesionales();

        $especialidadBusiness = new Especialidad();
        $especialidades = $especialidadBusiness->getEspecialidades();

        require_once('views/admin/Shared/layout.php');
    }

    public function newUser() {
        $idPaciente = isset($_GET['idPaciente']) ? $_GET['idPaciente'] : null; // Se usa para asignar un apoderado a un paciente.
        $vista = isset($_GET['vista']) ? $_GET['vista'] : null;
        $addApoderado = isset($_GET['addApoderado']) ? $_GET['addApoderado'] : null;

        require_once('views/admin/usuarios/newUser.php');
    }

    public function createNewUser() {
        $idPaciente = isset($_GET['idPaciente']) ? $_GET['idPaciente'] : null; // Se usa para asignar un apoderado a un paciente.
        $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : null;
        $apellido = isset($_GET['apellido']) ? $_GET['apellido'] : null;
        $idEspecialidad = isset($_GET['idEspecialidad']) ? $_GET['idEspecialidad'] : null;
        $fechaNac = isset($_GET['fechaNac']) ? $_GET['fechaNac'] : null;
        $correoElectronico = isset($_GET['email']) ? $_GET['email'] : null;
        $telefono1 = isset($_GET['telefono1']) ? $_GET['telefono1'] : null;
        $telefono2 = isset($_GET['telefono2']) ? $_GET['telefono2'] : null;
        $direccion = isset($_GET['direccion']) ? $_GET['direccion'] : null;
        $perfil = isset($_GET['perfil']) ? $_GET['perfil'] : null;

        $usuarioBusiness = new Usuario();
        $usuarioBusiness->newUser($nombre, $apellido, $idEspecialidad, $fechaNac, $correoElectronico, $telefono1, $telefono2, $direccion, $perfil, $idPaciente);
    }

    // Abrir vista para editar usuario
    public function userEdit() {

        $idUsuario = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : null;
        $vista = isset($_GET['vista']) ? $_GET['vista'] : null;
        $addApoderado = isset($_GET['addApoderado']) ? $_GET['addApoderado'] : null;

        $usuarioBusiness = new Usuario();
        $usuario = $usuarioBusiness->getUser($idUsuario);

        $especialidadBusiness = new Especialidad();
        $especialidades = $especialidadBusiness->getEspecialidades();

        require_once('views/admin/usuarios/userEdit.php');
    }

    //Guardar en BD los datos del usuario
    public function editUser() {
        $idUsuario = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : null;
        $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : null;
        $apellido = isset($_GET['apellido']) ? $_GET['apellido'] : null;
        $idEspecialidad = isset($_GET['idEspecialidad']) ? $_GET['idEspecialidad'] : null;
        $fechaNac = isset($_GET['fecha']) ? $_GET['fecha'] : null;
        $correo_electronico = isset($_GET['email']) ? $_GET['email'] : null;
        $telefono1 = isset($_GET['telefono1']) ? $_GET['telefono1'] : null;
        $telefono2 = isset($_GET['telefono2']) ? $_GET['telefono2'] : null;
        $direccion = isset($_GET['direccion']) ? $_GET['direccion'] : null;
        $perfil = isset($_GET['perfil']) ? $_GET['perfil'] : null;

        $usuarioBusiness = new Usuario();
        $usuarioBusiness->editUser($idUsuario, $nombre, $apellido, $idEspecialidad, $fechaNac, $correo_electronico, $telefono1, $telefono2, $direccion, $perfil);
    }

    //Guardar en BD los datos del usuario
    public function deleteUser() {
        $idUsuario = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : null;

        $usuarioBusiness = new Usuario();
        $usuarioBusiness->deleteUser($idUsuario);
    }

    public function passwordUser() {
        $idUsuario = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : null;

        require_once('views/admin/usuarios/passwordUser.php');
    }

    //Guardar en BD los datos del usuario
    public function changePasswordUser() {
        $idUsuario = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : null;
        $password = isset($_GET['password']) ? $_GET['password'] : null;

        $usuarioBusiness = new Usuario();
        $usuarioBusiness->changePasswordUser($idUsuario, $password);
    }

    /// END REGION PROFESIONALES

    /// REGION DETALLE DIARIO

    public function detallediario() {

        date_default_timezone_set('America/Santiago');

        $this->pageTitle = "Cognitivo Centro de Terapias";
        $this->pageDescription = "Centro de terapia especialista en Autismo. Contamos con especialidades en Fonoaudiología, Terapia Ocupacional, Psicología y Psicopedagogía.";
        $this->pageKeywords = 'centro de autismo, TEA, Fonoaudiología,Psicología,Psicopedagogía,centro de Terapia Ocupacional, centro de Terapia Ocupacional para niños';
        $this->page = 'views/admin/bill/index.php';
        $controller = "admin";
        $action = "cursos";

        $usuarioBusiness = new Usuario();
        $profesionales = $usuarioBusiness->getProfesionales();
        $pacientes = $usuarioBusiness->getPacientes();


        $fechaInicio = date("Y-m-d");
        $fechaFin = date("Y-m-d", strtotime($fechaInicio. ' + 1 days'));
        $fechaFin = date("Y-m-d H:i:s", strtotime($fechaFin) - 1);

        $detalleBusiness = new Detalle();
        $detalles = $detalleBusiness->getDetalle($fechaInicio, $fechaFin);

        require_once( 'views/admin/Shared/layout.php' );
    }

    /// END REGION DETALLE DIARIO

    public function error() {
        $this->pageTitle = 'Error | Cognitivo';
        $this->pageDescription = "Cognitvo centre de terapias especialista en TEA.";
        $this->pageKeywords = 'TEA, autismo, terapias';
        $this->page = 'views/error/error.php';
        $this->navbar = 'navbar.php';
        $this->navbarfooter = 'navbar-footer.php';
        
        require_once('views/layout.php');
    }
}