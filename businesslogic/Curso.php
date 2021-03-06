<?php

require_once "models/Curso_DAO.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

class Curso {

    public function enviarCorreoConfirmacion($idInscrito){

        $cursoDao = new Curso_DAO();
        $inscrito = $cursoDao->getInscrito($idInscrito);

        $mail = new PHPMailer(true);

        $correo = $inscrito['email'];
        //$correo = 'alediaz@ing.uchile.cl';

        try {
            //Server settings
            //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail.cognitivo.cl';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'inscripciones@cognitivo.cl';                 // SMTP username
            $mail->Password = '495@UC_-Xq8(';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('inscripciones@cognitivo.cl', 'Cognitivo');
            $mail->addAddress($correo, $inscrito['name']);     // Add a recipient
            $mail->addReplyTo('inscripciones@cognitivo.cl', 'Cognitivo');
            //$mail->addCC('cc@example.com');
            $mail->addBCC('alexjdm@gmail.com');

            $message = file_get_contents('views/template/confirmacion-curso-comunicacion-hijos.html');
            $message = str_replace('%nombrecompleto%', $inscrito['name'], $message);

            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Confirmación Curso Cognitivo';
            $mail->Body    = $message;
            //$mail->AltBody = 'Hola, has recibido correo a través de cognitivo.cl. Correo: ' . $correo . ' Telefono: ' . $telefono;

            $mail->CharSet = 'UTF-8';
            $mail->send();

            //$cursoDao->updateInscrito($inscrito['id'], $inscrito['pagado'], $inscrito['llamado'], 1, $inscrito['comentario'], false);

            $status  = "success";
            $message = "El mail ha sido enviado exitosamente.";

        } catch (Exception $e) {
            $status  = "error";
            //$message = 'Mensaje no pudo ser enviado.';
            $message = 'Mailer Error: ' . $mail->ErrorInfo;
        }

        $data = array(
            'status'  => $status,
            'message' => $message
        );

        echo json_encode($data);
    }

    public function enviarCorreoMasivo()
    {
        $idCorreoMasivo = 1;
        $cursoDao = new Curso_DAO();
        $inscritos1 = $cursoDao->getPagados(11);
        /*$inscritos2 = $cursoDao->getInscritos(2);
        $inscritos3 = $cursoDao->getInscritos(4);*/
        $inscritos = $inscritos1;
        /*$inscritos = array_merge($inscritos, $inscritos2);
        $inscritos = array_merge($inscritos, $inscritos3);*/

        $inscritosFinales = array();
        foreach ($inscritos as $inscrito) {
            $ins = array($inscrito['name'], $inscrito['email']);
            if (!in_array($ins, $inscritosFinales)) {
                array_push($inscritosFinales, $ins);
            }
        }

        /*$blackList = $cursoDao->getInscritos(9);

        foreach ($blackList as $bl) {
            $ins = array($bl['name'], $bl['email']);
            if (in_array($ins, $inscritosFinales)) {
                $inscritosFinales = array_diff($inscritosFinales, $ins);
            }
        }*/

        $status  = "success";
        $message = "El mail ha sido enviado exitosamente.";
        $inscritosNoEnviados = array();
        $contador = 0;
        foreach ($inscritosFinales as $inscritoFinal)
        {
            $correo = $inscritoFinal[1];
            //$correo = 'jazminn.chavez@gmail.com';

            if($correo == "" || $correo == null)
                continue;

            $contador = $contador + 1;
            /*if($contador < 42)
                continue;*/

            //sleep(20);

            $mail = new PHPMailer(true);

            try {
                //Server settings
                //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'mail.cognitivo.cl';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'inscripciones@cognitivo.cl';                 // SMTP username
                $mail->Password = '495@UC_-Xq8(';                           // SMTP password
                $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('inscripciones@cognitivo.cl', 'Cognitivo');
                $mail->addAddress($correo, $inscritoFinal[0]);     // Add a recipient
                $mail->addReplyTo('inscripciones@cognitivo.cl', 'Cognitivo');
                //$mail->addCC('cc@example.com');
                $mail->addBCC('alexjdm@gmail.com');

                $message = file_get_contents('views/template/confirmacion-curso-manejo-conductas-inapropiadas.html');
                $message = str_replace('%nombrecompleto%', $inscritoFinal[0], $message);

                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Curso Cognitivo';
                $mail->Body    = $message;
                //$mail->AltBody = 'Hola, has recibido correo a través de cognitivo.cl. Correo: ' . $correo . ' Telefono: ' . $telefono;

                $mail->CharSet = 'UTF-8';
                $mail->send();

                //$cursoDao->agregarCorreoMasivoEnviado($idCorreoMasivo, $inscritoFinal[1]);

            } catch (Exception $e) {
                $status  = "error";
                //$message = 'Mensaje no pudo ser enviado.';
                $message = 'Mailer Error: ' . $mail->ErrorInfo;
                //array_push($inscritosNoEnviados, $inscritoFinal);
                return;
            }
        }

        $data = array(
            'status'  => $status,
            'message' => $message
        );

        echo json_encode($data);
    }

}