<?php

/**
 * Created by PhpStorm.
 * User: alexj
 * Date: 12-04-2016
 * Time: 20:03
 */
class EspecialidadModel
{
    public function getEspecialidades(){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM especialidad WHERE HABILITADO='1'");
        $sql->execute();

        return $sql->fetchAll();
    }

    public function deleteEspecialidad($idEspecialidad){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("UPDATE especialidad set HABILITADO =:HABILITADO WHERE ID_ESPECIALIDAD=:ID_ESPECIALIDAD");

        if ($sql->execute(array('HABILITADO' => 0, 'ID_ESPECIALIDAD' => $idEspecialidad ))) {
            $status  = "success";
            $message = "La especialidad ha sido eliminada";
        }
        else
        {
            $status  = "error";
            $message = "Ha ocurrido un problema, por favor intenta nuevamente.";
        }

        $data = array(
            'status'  => $status,
            'message' => $message
        );

        echo json_encode($data);

        Database::disconnect();
    }

    public function newEspecialidad($nombre){

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM especialidad WHERE NOMBRE=:NOMBRE");
        $sql->execute(array('EMAIL' => $nombre));
        $resultado = $sql->fetch();

        if ($resultado == null) {

            $sql = $pdo->prepare("INSERT INTO `especialidad`(`NOMBRE`, `HABILIDAD`) VALUES (:NOMBRE, '1')");
            $sql->execute(array('NOMBRE' => $nombre));
            $id = $pdo->lastInsertId();

            if(!empty($id)) {
                $status  = "success";
                $message = "Registro exitoso.";
            }
            else{
                $status  = "error";
                $message = "Error con la base de datos, por favor intente nuevamente.";
            }

        }
        else{
            $status  = "error";
            $message = "Especialidad ya se encuentra registrada.";
        }

        $data = array(
            'status'  => $status,
            'message' => $message
        );

        echo json_encode($data);

        Database::disconnect();
    }

}