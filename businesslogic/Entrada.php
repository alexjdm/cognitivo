<?php

require_once 'connections/db.php';
include_once("models/Entrada_DAO.php");

class Entrada
{

    public $model;

    public function __construct()
    {
        $this->model = new Entrada_DAO();
    }

    public function getAll()
    {
        return $this->model->getAll();
    }

    public function getLastestPost()
    {
        return $this->model->getLastestPost();
    }


}