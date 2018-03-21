<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

class contactController {

    public function ados() {

        $mail = new PHPMailer(true);

        $correo = $_POST['email'];
        $telefono = $_POST['telefono'];

        try {
            //Server settings
            //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail.cognitivo.cl';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'hola@cognitivo.cl';                 // SMTP username
            $mail->Password = 'cognitivo08';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('hola@cognitivo.cl', 'Cognitivo');
            $mail->addAddress('hola@cognitivo.cl', 'Cognitivo');     // Add a recipient
            $mail->addAddress('directora@cognitivo.cl', 'Cognitivo');     // Add a recipient
            $mail->addReplyTo($correo, 'Cognitivo');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content

            $message = file_get_contents('views/template/contact-ados.html');
            $message = str_replace('%mail%', $correo, $message);
            $message = str_replace('%phone%', $telefono, $message);

            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Reserva ADOS';
            $mail->Body    = $message;
            $mail->AltBody = 'Hola, has recibido un contacto a través de cognitivo.cl. Correo: ' . $correo . ' Telefono: ' . $telefono;

            $mail->send();
            echo 'Mensaje Enviado';
        } catch (Exception $e) {
            echo 'Mensaje no pudo ser enviado.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }

        /*$send_to = 'hola@cognitivo.cl';
        $subject = 'Reserva ADOS';

        $correo = $_POST['email'];
        $telefono = $_POST['telefono'];

        $headers = 'From: Cognitivo' . '<' . $send_to . '>' . "\r\n";
        $headers .= 'Reply-To: ' . $correo . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $message = file_get_contents('views/template/contact-ados.html');
        $message = str_replace('%mail%', $correo, $message);
        $message = str_replace('%phone%', $telefono, $message);

        mail($send_to, $subject, $message, $headers);

        $send_to = 'directora@cognitivo.cl';
        if(mail($send_to, $subject, $message, $headers))
            echo "Enviado";
        else
            echo "Ocurrió un error, por favor intente nuevamente";
        */
    }

    public function contactpage() {

        $send_to = 'hola@cognitivo.cl';

        $errors         = array();  	// array to hold validation errors
        $data 			= array(); 		// array to pass back data

        // validate the variables ======================================================
        // if any of these variables don't exist, add an error to our $errors array

        if (empty($_POST['inputName']))
            $errors['name'] = 'Nombre es requerido.';

        if (empty($_POST['inputEmail']))
            $errors['email'] = 'Email es requerido.';

        if (empty($_POST['inputPhone']))
            $errors['phone'] = 'Teléfono es requerido.';

        if (empty($_POST['inputMessage']))
            $errors['message'] = 'Mensaje es requerido.';

        // return a response ===========================================================

        // if there are any errors in our errors array, return a success boolean of false
        if ( ! empty($errors)) {

            // if there are items in our errors array, return those errors
            $data['success'] = false;
            $data['errors']  = $errors;
        } else {

            // if there are no errors process our form, then return a message

            //If there is no errors, send the email
            if( empty($errors) ) {

                $subject = 'Contacto';
                $headers = 'From: ' . $send_to . "\r\n" .
                    'Reply-To: ' . $send_to . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

                $message = file_get_contents('views/template/contact-email.html');
                $message = str_replace('%username%', $_POST['inputName'], $message);
                $message = str_replace('%mail%', $_POST['inputEmail'], $message);
                $message = str_replace('%phone%', $_POST['inputPhone'], $message);
                $message = str_replace('%message%', $_POST['inputMessage'], $message);

                /*$message = 'Name: ' . $_POST['inputName'] . '

                    Email: ' . $_POST['inputEmail'] . '

                    Phone: ' . $_POST['inputPhone'] . '

                    Message: ' . $_POST['inputMessage'];*/

                $headers = 'From: Cognitivo' . '<' . $send_to . '>' . "\r\n";
                $headers .= 'Reply-To: ' . $_POST['inputEmail'] . "\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                mail($send_to, $subject, $message, $headers);

                $send_to = 'directora@cognitivo.cl';

                mail($send_to, $subject, $message, $headers);
            }

            // show a message of success and provide a true success variable
            $data['success'] = true;
            $data['message'] = 'Gracias!';
        }

        // return all our data to an AJAX call
        echo json_encode($data);

    }

    public function error() {
        require_once('views/error/error.php');
    }
}