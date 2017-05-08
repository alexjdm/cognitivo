<?php

class SesionModel
{
    public function getSesiones(){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM sesiones WHERE HABILITADO='1'");
        $sql->execute();

        return $sql->fetchAll();
    }

    public function getSesion($idSesion){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM sesiones WHERE ID_SESION='$idSesion' AND HABILITADO='1'");
        $sql->execute();

        return $sql->fetchAll()[0];
    }

    public function getNumeroSesion(){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT NUMERO_SESION FROM sesiones WHERE HABILITADO='1' order by NUMERO_SESION desc");
        $sql->execute();

        $result = $sql->fetchAll();
        if(count($result) > 0)
            return $result[0];
        else
            return null;
    }

    public function recalcularNumeroSesion($idPaciente, $idProfesional){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT NUMERO_SESION FROM sesiones WHERE ID_PACIENTE='$idPaciente' AND ID_PROFESIONAL='$idProfesional' AND HABILITADO='1' order by NUMERO_SESION desc limit 1");
        $sql->execute();

        $result = $sql->fetchAll();

        if(count($result) > 0)
        {
            $value = $result[0][0];
            $value += 1;
        }
        else
        {
            $value = 1;
        }

        $data = array(
            'status' => "success",
            'message' => strval($value)
        );

        echo json_encode($data);

        Database::disconnect();
    }

    public function editSesion($idSesion, $fecha, $idPaciente, $idProfesional, $numeroSesion, $comentario){

        $fecha = FormatearFechaEn($fecha);

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("UPDATE sesiones set FECHA =:FECHA, ID_PACIENTE =:ID_PACIENTE, ID_PROFESIONAL =:ID_PROFESIONAL, NUMERO_SESION =:NUMERO_SESION, COMENTARIO =:COMENTARIO WHERE ID_SESION=:ID_SESION");

        if ($sql->execute(array('FECHA' => $fecha, 'ID_PACIENTE' => $idPaciente, 'ID_PROFESIONAL' => $idProfesional, 'NUMERO_SESION' => $numeroSesion, 'COMENTARIO' => $comentario, 'ID_SESION' => $idSesion ))) {
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

    public function deleteSesion($idSesion){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("UPDATE cursos set HABILITADO =:HABILITADO WHERE ID_CURSO=:ID_CURSO");

        if ($sql->execute(array('HABILITADO' => 0, 'ID_CURSO' => $idSesion ))) {
            $status  = "success";
            $message = "La sesión ha sido eliminado.";
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

    public function newSesion($fecha, $paciente, $profesional, $numeroSesion, $comentario){

        $fecha = FormatearFechaEn($fecha);

        if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("INSERT INTO `sesiones`(`FECHA`, `ID_PACIENTE`, `ID_PROFESIONAL`, `NUMERO_SESION`, `COMENTARIO`, `HABILITADO`) VALUES (:fecha,:paciente,:profesional,:numeroSesion,:comentario,'1')");
        $sql->execute(array('fecha' => $fecha, 'paciente' => $paciente, 'profesional' => $profesional, 'numeroSesion' => $numeroSesion, 'comentario' => $comentario));
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