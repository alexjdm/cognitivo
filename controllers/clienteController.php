<?php

include_once("models/ClienteModel.php");
include_once("models/EmpresaModel.php");

class clienteController {

    public $modelC;
    public $modelE;

    public function __construct()
    {
        $this->modelC = new ClienteModel();
        $this->modelE = new EmpresaModel();
    }

    public function index() {
        $clientes = $this->modelC->getClientesList();
        $empresas = $this->modelE->getEmpresasList();
        require_once('views/clientes/index.php');
    }

    public function newCliente() {
        $empresas = $this->modelE->getEmpresasList();
        require_once('views/clientes/newCliente.php');
    }

    public function createNewCliente() {
        $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : null;
        $apellido = isset($_GET['apellido']) ? $_GET['apellido'] : null;
        $correo_electronico = isset($_GET['email']) ? $_GET['email'] : null;
        $telefono = isset($_GET['telefono']) ? $_GET['telefono'] : null;
        $idEmpresa = isset($_GET['idEmpresa']) ? $_GET['idEmpresa'] : null;

        return $this->modelC->newCliente($nombre, $apellido, $correo_electronico, $telefono, $idEmpresa);
    }

    // Abrir vista para editar usuario
    public function clienteEdit() {
        $idCliente = isset($_GET['idCliente']) ? $_GET['idCliente'] : null;
        $cliente = $this->modelC->getCliente($idCliente);
        $empresas = $this->modelE->getEmpresasList();
        require_once('views/clientes/clienteEdit.php');
    }

    //Guardar en BD los datos del usuario
    public function editCliente() {
        $idCliente = isset($_GET['idCliente']) ? $_GET['idCliente'] : null;
        $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : null;
        $apellido = isset($_GET['apellido']) ? $_GET['apellido'] : null;
        $email = isset($_GET['email']) ? $_GET['email'] : null;
        $telefono = isset($_GET['telefono']) ? $_GET['telefono'] : null;
        $idEmpresa = isset($_GET['idEmpresa']) ? $_GET['idEmpresa'] : null;

        return $this->modelC->editCliente($idCliente, $nombre, $apellido, $email, $telefono, $idEmpresa);
    }

    //Guardar en BD los datos del usuario
    public function deleteCliente() {
        $idCliente = isset($_GET['idCliente']) ? $_GET['idCliente'] : null;

        return $this->modelC->deleteCliente($idCliente);
    }

    public function error() {
        require_once('views/error/error.php');
    }
}
?>