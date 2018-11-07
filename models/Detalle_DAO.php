<?php

/**
 * Created by PhpStorm.
 * User: alexj
 * Date: 12-04-2016
 * Time: 20:03
 */
class Detalle_DAO
{
    public function getDetalle($fechaInicio, $fechaFin){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM detalle_diario WHERE :FECHA_INICIO <= FECHA and  FECHA <= :FECHA_FIN");
        $sql->execute(array(
            'FECHA_INICIO' => $fechaInicio,
            'FECHA_FIN' => $fechaFin)
        );

        return $sql->fetchAll();
    }

}