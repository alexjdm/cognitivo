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

        try {
            //Server settings
            //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail.cognitivo.cl';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'inscripciones@cognitivo.cl';                 // SMTP username
            $mail->Password = 'cognitivo08';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('inscripciones@cognitivo.cl', 'Cognitivo');
            $mail->addAddress($correo, $inscrito['name']);     // Add a recipient
            $mail->addReplyTo('inscripciones@cognitivo.cl', 'Cognitivo');
            //$mail->addCC('cc@example.com');
            $mail->addBCC('alexjdm@gmail.com');

            $message = file_get_contents('views/template/confirmacion-curso-tea.html');
            $message = str_replace('%nombrecompleto%', $inscrito['name'], $message);

            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Confirmacion Curso';
            $mail->Body    = $message;
            //$mail->AltBody = 'Hola, has recibido correo a través de cognitivo.cl. Correo: ' . $correo . ' Telefono: ' . $telefono;

            $mail->send();

            $cursoDao->updateInscrito($inscrito['id'], $inscrito['pagado'], $inscrito['llamado'], 1, $inscrito['comentario'], false);

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

}