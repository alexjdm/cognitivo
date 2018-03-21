<?php

require_once "models/Curso_DAO.php";
require_once "businesslogic/Curso.php";

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

    /// REGION CURSOS


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