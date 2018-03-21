<?php

include_once("models/ClienteModel.php");

class homeadminController {

    public $modelC;

    public function __construct()
    {
        $this->modelC = new ClienteModel();
    }

    public function index() {

        require_once('views/home/index.php');
    }

    public function error() {
        require_once('views/error/error.php');
    }
}
?>