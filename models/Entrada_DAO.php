<?php

class Entrada_DAO
{
    public function getAll(){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM entrada WHERE HABILITADO='1' order by FECHA desc");
        $sql->execute();

        return $sql->fetchAll();
    }

    public function getLastestPost(){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT top 2 * FROM entrada WHERE HABILITADO='1' order by FECHA desc");
        $sql->execute();

        return $sql->fetchAll();
    }

    public function getEntrada($idEntrada){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM entrada WHERE ID_ENTRADA=$idEntrada AND HABILITADO='1'");
        $sql->execute();

        return $sql->fetchAll()[0];
    }









    /*
    public function update($idInscrito, $pago, $llamado, $confirmacion, $comentario, $conResultado = true){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("UPDATE inscritos set pagado =:pagado, llamado =:llamado, confirmacion_enviada =:confirmacion, comentario =:comentario WHERE id=:id");

        if ($sql->execute(array('pagado' => $pago, 'llamado' => $llamado, 'confirmacion' => $confirmacion, 'comentario' => $comentario, 'id' => $idInscrito ))) {
            $status  = "success";
            $message = "Los datos han sido actualizados.";
        }
        else
        {
            $status  = "error";
            $message = "Ha ocurrido un problema con la actualización de los datos.";
        }

        $data = array(
            'status'  => $status,
            'message' => $message
        );

        if($conResultado)
        {
            echo json_encode($data);
        }

        Database::disconnect();
    }

    public function edit($idEntrada, $nombre, $fecha){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("UPDATE entrada set NOMBRE_CURSO =:NOMBRE, FECHA_CURSO =:FECHA_CURSO WHERE ID_ENTRADA=:ID_ENTRADA");

        if ($sql->execute(array('NOMBRE' => trim($nombre), 'FECHA_CURSO' => $fecha, 'ID_ENTRADA' => $idEntrada ))) {
            $status  = "success";
            $message = "Los datos han sido actualizados.";
        }
        else
        {
            $status  = "error";
            $message = "Ha ocurrido un problema con la actualización de los datos.";
        }

        $data = array(
            'status'  => $status,
            'message' => $message
        );

        echo json_encode($data);

        Database::disconnect();
    }

    public function delete($idEntrada){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("UPDATE entrada set HABILITADO =:HABILITADO WHERE ID_ENTRADA=:ID_ENTRADA");

        if ($sql->execute(array('HABILITADO' => 0, 'ID_ENTRADA' => $idEntrada ))) {
            $status  = "success";
            $message = "La entrada ha sido eliminado.";
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



    public function add($nombre, $fecha){

        if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("INSERT INTO `entrada`(`NOMBRE_CURSO`, `FECHA_CURSO`, `HABILITADO`) VALUES (:nombre,:fecha,'1')");
        $sql->execute(array('nombre' => trim($nombre), 'fecha' => $fecha));
        $id = $pdo->lastInsertId();

        if(!empty($id)) {
            $status  = "success";
            $message = "Creación exitosa.";
        }
        else{
            $status  = "error";
            $message = "Error con la base de datos, por favor intente nuevamente.";
        }

        $data = array(
            'status'  => $status,
            'message' => $message
        );

        echo json_encode($data);

        Database::disconnect();
    }
    */

}