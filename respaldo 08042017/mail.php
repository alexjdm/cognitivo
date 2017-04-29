<?php

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["name"]));
				$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $sexo = trim($_POST["sexo"]);
        $edad = trim($_POST["edad"]);
        $comuna = trim($_POST["comuna"]);
        $message = trim($_POST["message"]);

        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($sexo) OR empty($edad) OR empty($comuna) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Por favor rellene todos los campos e intente nuevamente.";
            exit;
        }

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = "contacto@andreaojeda.cl";

        // Set the email subject.
        $subject = "Nueva idea de $name";

        // Build the email content.
        $email_content = "Nombre: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Sexo: $sexo\n\n";
        $email_content .= "Edad: $edad\n\n";
        $email_content .= "Comuna: $comuna\n\n";
        $email_content .= "Mensaje:\n$message\n";

        // Build the email headers.
        $email_headers = "From: $name <$email>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "¡Gracias! Tu mensaje ha sido enviado.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "¡Vaya! Algo salió mal y no pudimos enviar su mensaje.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "Se ha producido un problema con tu envío. Inténtalo de nuevo.";
    }

?>
