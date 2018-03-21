<?php

class Curso_DAO
{
    public function getCursosList(){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM cursos WHERE HABILITADO='1'");
        $sql->execute();

        return $sql->fetchAll();
    }

    public function getCurso($idCurso){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM cursos WHERE ID_CURSO=$idCurso AND HABILITADO='1'");
        $sql->execute();

        return $sql->fetchAll()[0];
    }

    public function getInscritos($idCurso){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM inscritos WHERE ID_CURSO=$idCurso AND HABILITADO='1' ORDER BY fecha DESC");
        $sql->execute();

        return $sql->fetchAll();
    }

    public function getPagados($idCurso){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM inscritos WHERE ID_CURSO=$idCurso AND pagado='1' AND HABILITADO='1' ORDER BY fecha DESC");
        $sql->execute();

        return $sql->fetchAll();
    }

    public function getPagadosSinConfirmacion($idCurso){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM inscritos WHERE ID_CURSO=$idCurso AND pagado='1' AND HABILITADO='1' AND (confirmacion_enviada = 0 OR confirmacion_enviada is null)  ORDER BY fecha DESC");
        $sql->execute();

        return $sql->fetchAll();
    }

    public function getRecaudacion($idCurso){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT precio FROM inscritos WHERE ID_CURSO=$idCurso AND pagado='1' AND HABILITADO='1'");
        $sql->execute();

        $precios = $sql->fetchAll();
        $recaudado = 0;
        foreach($precios as $precio){
            $recaudado = $recaudado + $precio[0];
        }

        return $recaudado;
    }

    public function getPendientes($idCurso){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM inscritos WHERE ID_CURSO=$idCurso AND pagado='0' AND HABILITADO='1'");
        $sql->execute();

        return $sql->fetchAll();
    }

    public function getInscrito($idInscrito){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM inscritos WHERE id=$idInscrito AND HABILITADO='1'");
        $sql->execute();

        return $sql->fetchAll()[0];
    }

    public function updateInscrito($idInscrito, $pago, $llamado, $confirmacion, $comentario, $conResultado = true){
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

    public function editCurso($idCurso, $nombre, $fecha){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("UPDATE cursos set NOMBRE_CURSO =:NOMBRE, FECHA_CURSO =:FECHA_CURSO WHERE ID_CURSO=:ID_CURSO");

        if ($sql->execute(array('NOMBRE' => trim($nombre), 'FECHA_CURSO' => $fecha, 'ID_CURSO' => $idCurso ))) {
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

    public function deleteCurso($idCurso){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("UPDATE cursos set HABILITADO =:HABILITADO WHERE ID_CURSO=:ID_CURSO");

        if ($sql->execute(array('HABILITADO' => 0, 'ID_CURSO' => $idCurso ))) {
            $status  = "success";
            $message = "El curso ha sido eliminado.";
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

    public function deleteInscrito($idInscrito){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("UPDATE inscritos set HABILITADO =:HABILITADO WHERE id=:id");

        if ($sql->execute(array('HABILITADO' => 0, 'id' => $idInscrito ))) {
            $status  = "success";
            $message = "El inscrito ha sido eliminado.";
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

    public function newCurso($nombre, $fecha){

        if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("INSERT INTO `cursos`(`NOMBRE_CURSO`, `FECHA_CURSO`, `HABILITADO`) VALUES (:nombre,:fecha,'1')");
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

}