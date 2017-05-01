<?php

include_once("models/CursoModel.php");

class CursoController {

    public $model;

    public function __construct()
    {
        $this->model = new CursoModel();
    }

    public function index() {
        $cursos = $this->model->getCursosList();
        require_once('views/cursos/index.php');
    }

    public function pagados() {
        $idCurso = isset($_GET['idCurso']) ? $_GET['idCurso'] : null;
        $curso = $this->model->getCurso($idCurso);
        $pagados = $this->model->getPagados($idCurso);
        $pendientes = $this->model->getPendientes($idCurso);
        $recaudacion = $this->model->getRecaudacion($idCurso);

        $fecha = $curso['FECHA_CURSO'];
        $segundos = strtotime($fecha) - strtotime('now');
        $diferencia_dias = intval($segundos/60/60/24);

        require_once('views/cursos/pagados.php');
    }

    public function inscritos() {
        $idCurso = isset($_GET['idCurso']) ? $_GET['idCurso'] : null;
        $curso = $this->model->getCurso($idCurso);
        $inscritos = $this->model->getInscritos($idCurso);
        require_once('views/cursos/inscritos.php');
    }

    public function inscritoDetalle() {
        $idInscrito = isset($_GET['idInscrito']) ? $_GET['idInscrito'] : null;
        $inscrito = $this->model->getInscrito($idInscrito);
        require_once('views/cursos/inscritoDetalle.php');
    }

    public function updateInscrito() {
        $idInscrito = isset($_GET['idInscrito']) ? $_GET['idInscrito'] : null;
        $pago = isset($_GET['pago']) ? $_GET['pago'] : null;
        if($pago == "true"){
            $pago = 1;
        } else {
            $pago = 0;
        }
        $llamado = isset($_GET['llamado']) ? $_GET['llamado'] : null;
        if($llamado == "true"){
            $llamado = 1;
        } else {
            $llamado = 0;
        }
        $comentario = isset($_GET['comentario']) ? $_GET['comentario'] : null;

        return $this->model->updateInscrito($idInscrito, $pago, $llamado, $comentario);
    }

    public function createNewCurso() {
        $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : null;
        $fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null;
        if(isset($_GET['fecha'])){
            list($dia, $mes, $año) = split('[/.-]', $fecha);
            $fecha = $año . "-" . $mes . "-" . $dia;
        }

        return $this->model->newCurso($nombre, $fecha);
    }

    public function cursoEdit() {
        $idCurso = isset($_GET['idCurso']) ? $_GET['idCurso'] : null;
        $curso = $this->model->getCurso($idCurso);
        require_once('views/cursos/cursoEdit.php');
    }

    //Guardar en BD los datos del usuario
    public function editCurso() {
        $idCurso = isset($_GET['idCurso']) ? $_GET['idCurso'] : null;
        $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : null;
        $fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null;
        if(isset($_GET['fecha'])){
            list($dia, $mes, $año) = split('[/.-]', $fecha);
            $fecha = $año . "-" . $mes . "-" . $dia;
        }

        return $this->model->editCurso($idCurso, $nombre, $fecha);
    }

    public function deleteCurso() {
        $idCurso = isset($_GET['idCurso']) ? $_GET['idCurso'] : null;

        return $this->model->deleteCurso($idCurso);
    }

    public function deleteInscrito() {
        $idInscrito = isset($_GET['idInscrito']) ? $_GET['idInscrito'] : null;

        return $this->model->deleteInscrito($idInscrito);
    }

    public function error() {
        require_once('views/error/error.php');
    }
}