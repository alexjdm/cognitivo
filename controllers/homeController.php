<?php

include_once('lib/khipu/khipu-lib.php');
require_once ('connections/db.php');
require_once ('helpers/CommonHelper.php');
require_once ("businesslogic/Entrada.php");

class homeController {

    public $pageTitle = "Cognitivo Centro de Terapias";
    public $pageDescription = "Centro de terapia especialista en Autismo. Contamos con especialidades en Fonoaudiología, Terapia Ocupacional, Psicología y Psicopedagogía.";
    public $page = 'views/home/index.php';
    public $navbar = 'navbar.php';
    public $navbarfooter = 'navbar-footer.php';

    public function index() {
        $this->pageTitle = "Cognitivo Centro de Terapias";
        $this->pageDescription = "Centro de terapia especialista en Autismo. Contamos con especialidades en Fonoaudiología, Terapia Ocupacional, Psicología y Psicopedagogía.";
        $this->page = 'views/home/index.php';
        $this->navbar = 'navbar.php';
        $this->navbarfooter = 'navbar-footer.php';
        $this->pageKeywords = 'centro de autismo, TEA, Fonoaudiología,Psicología,Psicopedagogía,centro de Terapia Ocupacional, centro de Terapia Ocupacional para niños';

        $entradaBusiness = new Entrada();
        $entradas = $entradaBusiness->getAll();

        require_once( 'views/layout.php' );
    }

    public function ados() {
        $this->pageTitle = 'ADOS 2 | Cognitivo';
        $this->pageDescription = "Certificación en Evaluación Clínica ADOS-2 para el diagnóstico de Autismo y de los transtornos generalizados del desarrollo en pacientes de distintos niveles de desarrollo del lenguje y edades.";
        $this->pageKeywords = "ADOS-2,Examen ADOS-2,Evaluación Clínica ADOS-2,Test ADOS-2, Autismo, TEA";
        $this->page = 'views/home/ados.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function capacitaciones() {
        $this->pageTitle = 'Capacitaciones | Cognitivo';
        $this->pageDescription = "Certificación en Evaluación Clínica ADOS-2 para el diagnóstico de Autismo y de los transtornos generalizados del desarrollo en pacientes de distintos niveles de desarrollo del lenguje y edades.";
        $this->pageKeywords = "ADOS-2,Examen ADOS-2,Evaluación Clínica ADOS-2,Test ADOS-2, Autismo, TEA";
        $this->page = 'views/home/capacitaciones.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function equipo() {
        $this->pageTitle = 'Equipo | Cognitivo';
        $this->pageDescription = "Equipo interdisciplinario especialista en Autismo.";
        $this->pageKeywords = "Equipo interdisciplinario, Autismo, TEA";
        $this->page = 'views/home/equipo.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function condicionesplanes() {
        $this->pageTitle = 'Condiciones Planes | Cognitivo';
        $this->pageDescription = "Planes integrales para niños con TEA.";
        $this->pageKeywords = "Plan, programa, Autismo, TEA";
        $this->page = 'views/home/condiciones-planes.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function cursoteamanejoconductascomplejas() {
        $this->pageTitle = 'TEA y Manejo de conductas complejas | Cognitivo';
        $this->pageDescription = "Equipo interdisciplinario especialista en Autismo.";
        $this->pageKeywords = "Equipo interdisciplinario, Autismo, TEA";
        $this->page = 'views/home/curso-tea-manejo-conductas-complejas.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function cursoteamanejoconductascomplejasprocess() {
        $this->pageTitle = 'TEA y Manejo de conductas complejas | Cognitivo';
        $this->pageDescription = "Equipo interdisciplinario especialista en Autismo.";
        $this->pageKeywords = "Equipo interdisciplinario, Autismo, TEA";
        $this->page = 'views/home/curso-tea-manejo-conductas-complejas-process.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        $name		= sanear_string($_POST['name']);
        $rut		= $_POST['rut'];
        $email 		= $_POST['email'];
        $phone 		= $_POST['phone'];
        $comuna 	= $_POST['comuna'];
        $id_transaccion 	= rand(10000, 99999);
        $bankId 	= $_POST['bankId'];
        $nombreBanco 	= $_POST['nombreBanco'];
        $ocupacion = "";
        $carrera = "";

        $precio		= 10000;
        $idCurso	= 3;

        if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
            header('Location: index.php?invalid=true');
            return;
        }

        date_default_timezone_set("America/Santiago");


        if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare('INSERT INTO `inscritos`(`name`, `rut`, `email`, `phone`, `COMUNA`, `ocupacion`, `carrera`, `pagado`, `banco`, `precio`, `fecha`, `llamado`, `comentario`, `id_transaccion`, `ID_CURSO`) VALUES ("'.$name.'", "'.$rut.'", "'.$email.'", "'.$phone.'", "'.$comuna.'", "'.$ocupacion.'", "'.$carrera.'", "0", "'.$_REQUEST['nombreBanco'].'", "'.$precio.'", now(), "0", "", "'.$id_transaccion.'", "'.$idCurso.'")');
        $sql->execute();

        $json = khipu_get_new_payment($_REQUEST['email'], $_REQUEST['bankId'], $precio, $id_transaccion);
        $data = urlencode($json);

        require_once('views/layout.php');
    }

    public function cursoteamanejoconductascomplejasfinish() {
        $this->pageTitle = 'TEA y Manejo de conductas complejas | Cognitivo';
        $this->pageDescription = "Equipo interdisciplinario especialista en Autismo.";
        $this->pageKeywords = "Equipo interdisciplinario, Autismo, TEA";
        $this->page = 'views/home/curso-tea-manejo-conductas-complejas-finish.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function cursoteamanejoconductascomplejasnotifyjs() {
        $my_receiver_id = 55616;
        //$my_receiver_id = 169939; // Modo desarrollador

        // Leer los parametros enviados por khipu
        $api_version = $_POST['api_version'];
        $receiver_id = $_POST['receiver_id'];
        $notification_id = $_POST['notification_id'];
        $subject = $_POST['subject'];
        $amount = $_POST['amount'];
        $currency = $_POST['currency'];
        $custom = $_POST['custom'];
        $transaction_id = $_POST['transaction_id'];
        $payer_email = $_POST['payer_email'];
        $notification_signature = $_POST['notification_signature'];

        // Creamos el string para enviar
        $to_send = 'api_version=' . urlencode($api_version) .
            '&receiver_id=' . urlencode($receiver_id) .
            '&notification_id=' . urlencode($notification_id) .
            '&subject=' . urlencode($subject) .
            '&amount=' . urlencode($amount) .
            '&currency=' . urlencode($currency) .
            '&transaction_id=' . urlencode($transaction_id) .
            '&payer_email=' . urlencode($payer_email) .
            '&custom=' . urlencode($custom);

        $ch = curl_init("https://khipu.com/api/1.2/verifyPaymentNotification");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $to_send . "&notification_signature=" . urlencode($notification_signature));
        $response = curl_exec($ch);
        curl_close($ch);

        $line = "Validacion remota [Message: $to_send, Signature: $notification_signature, Valid: $response]\n";

        $myFile = 'curso-tea-manejo-conductas-complejas-khipu-js.log';
        $fh = fopen($myFile,'a') or die("can't open file");
        fwrite($fh, print_r($_REQUEST, true));
        fwrite($fh, $line);

        if ($transaction_id == 'demo-js-transaction-1' && $response == 'VERIFIED' && $receiver_id == $my_receiver_id) {
            $headers = 'From: "Curso.php Cognitivo" <no-responder@khipu.com>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $subject = 'Pago exitoso Curso.php Cognitivo';
            $body = <<<EOF
Hola<br/>
<br/>
<p>
Recibes este correo pues el pago fue conciliado por Khipu.
</p>
<br><br>Atentamente,<br>Equipo Cognitivo<br><img src='dist/images/logo-hor.png'>
EOF;
            mail($custom, $subject, $body, $headers);
            fwrite($fh, "Enviado $subject a $custom");
        }
        fclose($fh);

    }




    public function cursodificultadessensorialesredsensorial() {
        $this->pageTitle = 'Autismo y Problemas de Alimentación | Cognitivo';
        $this->pageDescription = "Seminario intensivo sobre Autismo y problemas en la alimentación.";
        $this->pageKeywords = "Seminario, curso, Autismo, TEA, Problemas alimentacion";
        $this->page = 'views/home/curso-dificultades-sensoriales-red-sensorial.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function cursodificultadessensorialesredsensorialprocess() {
        $this->pageTitle = 'Autismo y Problemas de Alimentación | Cognitivo';
        $this->pageDescription = "Seminario intensivo sobre Autismo y problemas en la alimentación.";
        $this->pageKeywords = "Seminario, curso, Autismo, TEA, Problemas alimentacion";
        $this->page = 'views/home/curso-dificultades-sensoriales-red-sensorial-process.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        $name		= sanear_string($_POST['name']);
        $rut		= $_POST['rut'];
        $email 		= $_POST['email'];
        $phone 		= $_POST['phone'];
        $comuna 	= $_POST['comuna'];
        $ocupacion 	= $_POST['ocupacion'];
        $carrera 	= $_POST['carrera'];
        $id_transaccion 	= rand(10000, 99999);
        $bankId 	= $_POST['bankId'];
        $nombreBanco 	= $_POST['nombreBanco'];

        $precio		= 65000;
        if($ocupacion == 2){
            $precio	= 65000;
        }
        $idCurso	= 4;

        if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
            header('Location: index.php?invalid=true');
            return;
        }

        date_default_timezone_set("America/Santiago");


        if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare('INSERT INTO `inscritos`(`name`, `rut`, `email`, `phone`, `COMUNA`, `ocupacion`, `carrera`, `pagado`, `banco`, `precio`, `fecha`, `llamado`, `comentario`, `id_transaccion`, `ID_CURSO`) VALUES ("'.$name.'", "'.$rut.'", "'.$email.'", "'.$phone.'", "'.$comuna.'", "'.$ocupacion.'", "'.$carrera.'", "0", "'.$_REQUEST['nombreBanco'].'", "'.$precio.'", now(), "0", "", "'.$id_transaccion.'", "'.$idCurso.'")');
        $sql->execute();

        $json = khipu_get_new_payment($_REQUEST['email'], $_REQUEST['bankId'], $precio, $id_transaccion);
        $data = urlencode($json);

        require_once('views/layout.php');
    }

    public function cursodificultadessensorialesredsensorialfinish() {
        $this->pageTitle = 'Autismo y Problemas de Alimentación | Cognitivo';
        $this->pageDescription = "Seminario intensivo sobre Autismo y problemas en la alimentación.";
        $this->pageKeywords = "Seminario, curso, Autismo, TEA, Problemas alimentacion";
        $this->page = 'views/home/curso-dificultades-sensoriales-red-sensorial-finish.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function cursodificultadessensorialesredsensorialnotifyjs() {
        $my_receiver_id = 55616;
        //$my_receiver_id = 169939; // Modo desarrollador

        // Leer los parametros enviados por khipu
        $api_version = $_POST['api_version'];
        $receiver_id = $_POST['receiver_id'];
        $notification_id = $_POST['notification_id'];
        $subject = $_POST['subject'];
        $amount = $_POST['amount'];
        $currency = $_POST['currency'];
        $custom = $_POST['custom'];
        $transaction_id = $_POST['transaction_id'];
        $payer_email = $_POST['payer_email'];
        $notification_signature = $_POST['notification_signature'];

        // Creamos el string para enviar
        $to_send = 'api_version=' . urlencode($api_version) .
            '&receiver_id=' . urlencode($receiver_id) .
            '&notification_id=' . urlencode($notification_id) .
            '&subject=' . urlencode($subject) .
            '&amount=' . urlencode($amount) .
            '&currency=' . urlencode($currency) .
            '&transaction_id=' . urlencode($transaction_id) .
            '&payer_email=' . urlencode($payer_email) .
            '&custom=' . urlencode($custom);

        $ch = curl_init("https://khipu.com/api/1.2/verifyPaymentNotification");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $to_send . "&notification_signature=" . urlencode($notification_signature));
        $response = curl_exec($ch);
        curl_close($ch);

        $line = "Validacion remota [Message: $to_send, Signature: $notification_signature, Valid: $response]\n";

        $myFile = 'curso-dificultades-sensoriales-red-sensorial-khipu-js.log';
        $fh = fopen($myFile,'a') or die("can't open file");
        fwrite($fh, print_r($_REQUEST, true));
        fwrite($fh, $line);

        if ($transaction_id == 'demo-js-transaction-1' && $response == 'VERIFIED' && $receiver_id == $my_receiver_id) {
            $headers = 'From: "Curso.php Cognitivo" <no-responder@khipu.com>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $subject = 'Pago exitoso Curso.php Cognitivo';
            $body = <<<EOF
Hola<br/>
<br/>
<p>
Recibes este correo pues el pago fue conciliado por Khipu.
</p>
<br><br>Atentamente,<br>Equipo Cognitivo<br><img src='dist/images/logo-hor.png'>
EOF;
            mail($custom, $subject, $body, $headers);
            fwrite($fh, "Enviado $subject a $custom");
        }
        fclose($fh);

    }




    public function cursointegracionsensorialalimentacion() {
        $this->pageTitle = 'Integración Sensorial y Alimentación | Cognitivo';
        $this->pageDescription = "Curso para padres sobre integración sensorial y alimentación.";
        $this->pageKeywords = "Curso, Autismo, TEA, Problemas de alimentación";
        $this->page = 'views/home/curso-integracion-sensorial-alimentacion.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function cursointegracionsensorialalimentacionprocess() {
        $this->pageTitle = 'Integración Sensorial y Alimentación | Cognitivo';
        $this->pageDescription = "Curso para padres sobre integración sensorial y alimentación.";
        $this->pageKeywords = "Curso, Autismo, TEA, Problemas de alimentación";
        $this->page = 'views/home/curso-integracion-sensorial-alimentacion-process.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        $name		= sanear_string($_POST['name']);
        $rut		= $_POST['rut'];
        $email 		= $_POST['email'];
        $phone 		= $_POST['phone'];
        $comuna 	= $_POST['comuna'];
        $ocupacion 	= "";
        $carrera 	= "";
        $id_transaccion 	= rand(10000, 99999);
        $bankId 	= $_POST['bankId'];
        $nombreBanco 	= $_POST['nombreBanco'];

        $precio		= 10000;
        $idCurso	= 5;

        if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
            header('Location: index.php?invalid=true');
            return;
        }

        date_default_timezone_set("America/Santiago");


        if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare('INSERT INTO `inscritos`(`name`, `rut`, `email`, `phone`, `COMUNA`, `ocupacion`, `carrera`, `pagado`, `banco`, `precio`, `fecha`, `llamado`, `comentario`, `id_transaccion`, `ID_CURSO`) VALUES ("'.$name.'", "'.$rut.'", "'.$email.'", "'.$phone.'", "'.$comuna.'", "'.$ocupacion.'", "'.$carrera.'", "0", "'.$_REQUEST['nombreBanco'].'", "'.$precio.'", now(), "0", "", "'.$id_transaccion.'", "'.$idCurso.'")');
        $sql->execute();

        $json = khipu_get_new_payment($_REQUEST['email'], $_REQUEST['bankId'], $precio, $id_transaccion);
        $data = urlencode($json);

        require_once('views/layout.php');
    }

    public function cursointegracionsensorialalimentacionfinish() {
        $this->pageTitle = 'Integración Sensorial y Alimentación | Cognitivo';
        $this->pageDescription = "Curso para padres sobre integración sensorial y alimentación.";
        $this->pageKeywords = "Curso, Autismo, TEA, Problemas de alimentación";
        $this->page = 'views/home/curso-integracion-sensorial-alimentacion-finish.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function cursointegracionsensorialalimentacionnotifyjs() {
        $my_receiver_id = 55616;
        //$my_receiver_id = 169939; // Modo desarrollador

        // Leer los parametros enviados por khipu
        $api_version = $_POST['api_version'];
        $receiver_id = $_POST['receiver_id'];
        $notification_id = $_POST['notification_id'];
        $subject = $_POST['subject'];
        $amount = $_POST['amount'];
        $currency = $_POST['currency'];
        $custom = $_POST['custom'];
        $transaction_id = $_POST['transaction_id'];
        $payer_email = $_POST['payer_email'];
        $notification_signature = $_POST['notification_signature'];

        // Creamos el string para enviar
        $to_send = 'api_version=' . urlencode($api_version) .
            '&receiver_id=' . urlencode($receiver_id) .
            '&notification_id=' . urlencode($notification_id) .
            '&subject=' . urlencode($subject) .
            '&amount=' . urlencode($amount) .
            '&currency=' . urlencode($currency) .
            '&transaction_id=' . urlencode($transaction_id) .
            '&payer_email=' . urlencode($payer_email) .
            '&custom=' . urlencode($custom);

        $ch = curl_init("https://khipu.com/api/1.2/verifyPaymentNotification");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $to_send . "&notification_signature=" . urlencode($notification_signature));
        $response = curl_exec($ch);
        curl_close($ch);

        $line = "Validacion remota [Message: $to_send, Signature: $notification_signature, Valid: $response]\n";

        $myFile = 'curso-integracion-sensorial-alimentacion-khipu-js.log';
        $fh = fopen($myFile,'a') or die("can't open file");
        fwrite($fh, print_r($_REQUEST, true));
        fwrite($fh, $line);

        if ($transaction_id == 'demo-js-transaction-1' && $response == 'VERIFIED' && $receiver_id == $my_receiver_id) {
            $headers = 'From: "Curso Cognitivo" <no-responder@khipu.com>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $subject = 'Pago exitoso Curso Cognitivo';
            $body = <<<EOF
Hola<br/>
<br/>
<p>
Recibes este correo pues el pago fue conciliado por Khipu.
</p>
<br><br>Atentamente,<br>Equipo Cognitivo<br><img src='dist/images/logo-hor.png'>
EOF;
            mail($custom, $subject, $body, $headers);
            fwrite($fh, "Enviado $subject a $custom");
        }
        fclose($fh);

    }




    public function cursocomoayudarhijoscomunicarse() {
        $this->pageTitle = '¿Cómo le ayudo a mi hijo a comunicarse? | Cognitivo';
        $this->pageDescription = "Curso para padres sobre la comunicación de sus hijos en sus etapas del desarrollo.";
        $this->pageKeywords = "Curso, Autismo, TEA, Problemas de comunicación,";
        $this->page = 'views/home/curso-como-ayudar-hijos-comunicarse.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function cursocomoayudarhijoscomunicarseprocess() {
        $this->pageTitle = '¿Cómo le ayudo a mi hijo a comunicarse? | Cognitivo';
        $this->pageDescription = "Curso para padres sobre la comunicación de sus hijos en sus etapas del desarrollo.";
        $this->pageKeywords = "Curso, Autismo, TEA, Problemas de comunicación,";
        $this->page = 'views/home/curso-como-ayudar-hijos-comunicarse-process.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        $name		= sanear_string($_POST['name']);
        $rut		= $_POST['rut'];
        $email 		= $_POST['email'];
        $phone 		= $_POST['phone'];
        $comuna 	= $_POST['comuna'];
        $ocupacion 	= "";
        $carrera 	= "";
        $id_transaccion 	= rand(10000, 99999);
        $bankId 	= $_POST['bankId'];
        $nombreBanco 	= $_POST['nombreBanco'];

        $precio		= 10000;
        $idCurso	= 6;

        if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
            header('Location: index.php?invalid=true');
            return;
        }

        date_default_timezone_set("America/Santiago");


        if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare('INSERT INTO `inscritos`(`name`, `rut`, `email`, `phone`, `COMUNA`, `ocupacion`, `carrera`, `pagado`, `banco`, `precio`, `fecha`, `llamado`, `comentario`, `id_transaccion`, `ID_CURSO`) VALUES ("'.$name.'", "'.$rut.'", "'.$email.'", "'.$phone.'", "'.$comuna.'", "'.$ocupacion.'", "'.$carrera.'", "0", "'.$_REQUEST['nombreBanco'].'", "'.$precio.'", now(), "0", "", "'.$id_transaccion.'", "'.$idCurso.'")');
        $sql->execute();

        $json = khipu_get_new_payment($_REQUEST['email'], $_REQUEST['bankId'], $precio, $id_transaccion);
        $data = urlencode($json);

        require_once('views/layout.php');
    }

    public function cursocomoayudarhijoscomunicarsefinish() {
        $this->pageTitle = '¿Cómo le ayudo a mi hijo a comunicarse? | Cognitivo';
        $this->pageDescription = "Curso para padres sobre la comunicación de sus hijos en sus etapas del desarrollo.";
        $this->pageKeywords = "Curso, Autismo, TEA, Problemas de comunicación,";
        $this->page = 'views/home/curso-como-ayudar-hijos-comunicarse-finish.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function cursocomoayudarhijoscomunicarsenotifyjs() {
        $my_receiver_id = 55616;
        //$my_receiver_id = 169939; // Modo desarrollador

        // Leer los parametros enviados por khipu
        $api_version = $_POST['api_version'];
        $receiver_id = $_POST['receiver_id'];
        $notification_id = $_POST['notification_id'];
        $subject = $_POST['subject'];
        $amount = $_POST['amount'];
        $currency = $_POST['currency'];
        $custom = $_POST['custom'];
        $transaction_id = $_POST['transaction_id'];
        $payer_email = $_POST['payer_email'];
        $notification_signature = $_POST['notification_signature'];

        // Creamos el string para enviar
        $to_send = 'api_version=' . urlencode($api_version) .
            '&receiver_id=' . urlencode($receiver_id) .
            '&notification_id=' . urlencode($notification_id) .
            '&subject=' . urlencode($subject) .
            '&amount=' . urlencode($amount) .
            '&currency=' . urlencode($currency) .
            '&transaction_id=' . urlencode($transaction_id) .
            '&payer_email=' . urlencode($payer_email) .
            '&custom=' . urlencode($custom);

        $ch = curl_init("https://khipu.com/api/1.2/verifyPaymentNotification");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $to_send . "&notification_signature=" . urlencode($notification_signature));
        $response = curl_exec($ch);
        curl_close($ch);

        $line = "Validacion remota [Message: $to_send, Signature: $notification_signature, Valid: $response]\n";

        $myFile = 'curso-como-ayudar-hijos-comunicarse-khipu-js.log';
        $fh = fopen($myFile,'a') or die("can't open file");
        fwrite($fh, print_r($_REQUEST, true));
        fwrite($fh, $line);

        if ($transaction_id == 'demo-js-transaction-1' && $response == 'VERIFIED' && $receiver_id == $my_receiver_id) {
            $headers = 'From: "Curso Cognitivo" <no-responder@khipu.com>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $subject = 'Pago exitoso Curso Cognitivo';
            $body = <<<EOF
Hola<br/>
<br/>
<p>
Recibes este correo pues el pago fue conciliado por Khipu.
</p>
<br><br>Atentamente,<br>Equipo Cognitivo<br><img src='dist/images/logo-hor.png'>
EOF;
            mail($custom, $subject, $body, $headers);
            fwrite($fh, "Enviado $subject a $custom");
        }
        fclose($fh);

    }







    public function cursodesarrollohabilidadesescolares() {
        $this->pageTitle = 'Desarrollo de habilidades y aprendizajes escolares | Cognitivo';
        $this->pageDescription = "Curso que entrega herramientas a los padres sobre las dificultades de sus hijos en epoca escolar.";
        $this->pageKeywords = "Curso, Autismo, TEA, aprendizaje escolar";
        $this->page = 'views/home/curso-desarrollo-habilidades-escolares.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function cursodesarrollohabilidadesescolaresprocess() {
        $this->pageTitle = 'Desarrollo de habilidades y aprendizajes escolares | Cognitivo';
        $this->pageDescription = "Curso que entrega herramientas a los padres sobre las dificultades de sus hijos en epoca escolar.";
        $this->pageKeywords = "Curso, Autismo, TEA, aprendizaje escolar";
        $this->page = 'views/home/curso-desarrollo-habilidades-escolares-process.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        $name		= sanear_string($_POST['name']);
        $rut		= $_POST['rut'];
        $email 		= $_POST['email'];
        $phone 		= $_POST['phone'];
        $comuna 	= $_POST['comuna'];
        $ocupacion 	= "";
        $carrera 	= "";
        $id_transaccion 	= rand(10000, 99999);
        $bankId 	= $_POST['bankId'];
        $nombreBanco 	= $_POST['nombreBanco'];

        $precio		= 10000;
        $idCurso	= 7;

        if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
            header('Location: index.php?invalid=true');
            return;
        }

        date_default_timezone_set("America/Santiago");


        if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare('INSERT INTO `inscritos`(`name`, `rut`, `email`, `phone`, `COMUNA`, `ocupacion`, `carrera`, `pagado`, `banco`, `precio`, `fecha`, `llamado`, `comentario`, `id_transaccion`, `ID_CURSO`) VALUES ("'.$name.'", "'.$rut.'", "'.$email.'", "'.$phone.'", "'.$comuna.'", "'.$ocupacion.'", "'.$carrera.'", "0", "'.$_REQUEST['nombreBanco'].'", "'.$precio.'", now(), "0", "", "'.$id_transaccion.'", "'.$idCurso.'")');
        $sql->execute();

        $json = khipu_get_new_payment($_REQUEST['email'], $_REQUEST['bankId'], $precio, $id_transaccion);
        $data = urlencode($json);

        require_once('views/layout.php');
    }

    public function cursodesarrollohabilidadesescolaresfinish() {
        $this->pageTitle = 'Desarrollo de habilidades y aprendizajes escolares | Cognitivo';
        $this->pageDescription = "Curso que entrega herramientas a los padres sobre las dificultades de sus hijos en epoca escolar.";
        $this->pageKeywords = "Curso, Autismo, TEA, aprendizaje escolar";
        $this->page = 'views/home/curso-desarrollo-habilidades-escolares-finish.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function cursodesarrollohabilidadesescolaresnotifyjs() {
        $my_receiver_id = 55616;
        //$my_receiver_id = 169939; // Modo desarrollador

        // Leer los parametros enviados por khipu
        $api_version = $_POST['api_version'];
        $receiver_id = $_POST['receiver_id'];
        $notification_id = $_POST['notification_id'];
        $subject = $_POST['subject'];
        $amount = $_POST['amount'];
        $currency = $_POST['currency'];
        $custom = $_POST['custom'];
        $transaction_id = $_POST['transaction_id'];
        $payer_email = $_POST['payer_email'];
        $notification_signature = $_POST['notification_signature'];

        // Creamos el string para enviar
        $to_send = 'api_version=' . urlencode($api_version) .
            '&receiver_id=' . urlencode($receiver_id) .
            '&notification_id=' . urlencode($notification_id) .
            '&subject=' . urlencode($subject) .
            '&amount=' . urlencode($amount) .
            '&currency=' . urlencode($currency) .
            '&transaction_id=' . urlencode($transaction_id) .
            '&payer_email=' . urlencode($payer_email) .
            '&custom=' . urlencode($custom);

        $ch = curl_init("https://khipu.com/api/1.2/verifyPaymentNotification");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $to_send . "&notification_signature=" . urlencode($notification_signature));
        $response = curl_exec($ch);
        curl_close($ch);

        $line = "Validacion remota [Message: $to_send, Signature: $notification_signature, Valid: $response]\n";

        $myFile = 'curso-desarrollo-habilidades-escolares-khipu-js.log';
        $fh = fopen($myFile,'a') or die("can't open file");
        fwrite($fh, print_r($_REQUEST, true));
        fwrite($fh, $line);

        if ($transaction_id == 'demo-js-transaction-1' && $response == 'VERIFIED' && $receiver_id == $my_receiver_id) {
            $headers = 'From: "Curso Cognitivo" <no-responder@khipu.com>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $subject = 'Pago exitoso Curso Cognitivo';
            $body = <<<EOF
Hola<br/>
<br/>
<p>
Recibes este correo pues el pago fue conciliado por Khipu.
</p>
<br><br>Atentamente,<br>Equipo Cognitivo<br><img src='dist/images/logo-hor.png'>
EOF;
            mail($custom, $subject, $body, $headers);
            fwrite($fh, "Enviado $subject a $custom");
        }
        fclose($fh);

    }






    public function cursoayudahijosenfermedadesrespiratorias() {
        $this->pageTitle = 'Medidas para mitigar y controlar los efectos de una enfermedad respiratoria | Cognitivo';
        $this->pageDescription = "Curso que entrega herramientas a los padres para poder mitigar y controlar los efectos de una enfermedad respiratoria.";
        $this->pageKeywords = "Curso enferemedades respiratorias, kinesiología";
        $this->page = 'views/home/curso-ayuda-hijos-enfermedades-respiratorias.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function cursoayudahijosenfermedadesrespiratoriasprocess() {
        $this->pageTitle = 'Medidas para mitigar y controlar los efectos de una enfermedad respiratoria | Cognitivo';
        $this->pageDescription = "Curso que entrega herramientas a los padres para poder mitigar y controlar los efectos de una enfermedad respiratoria.";
        $this->pageKeywords = "Curso enferemedades respiratorias, kinesiología";
        $this->page = 'views/home/curso-ayuda-hijos-enfermedades-respiratorias-process.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        $name		= sanear_string($_POST['name']);
        $rut		= $_POST['rut'];
        $email 		= $_POST['email'];
        $phone 		= $_POST['phone'];
        $comuna 	= $_POST['comuna'];
        $ocupacion 	= "";
        $carrera 	= "";
        $id_transaccion 	= rand(10000, 99999);
        $bankId 	= $_POST['bankId'];
        $nombreBanco 	= $_POST['nombreBanco'];

        $precio		= 10000;
        $idCurso	= 8;

        if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
            header('Location: index.php?invalid=true');
            return;
        }

        date_default_timezone_set("America/Santiago");


        if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare('INSERT INTO `inscritos`(`name`, `rut`, `email`, `phone`, `COMUNA`, `ocupacion`, `carrera`, `pagado`, `banco`, `precio`, `fecha`, `llamado`, `comentario`, `id_transaccion`, `ID_CURSO`) VALUES ("'.$name.'", "'.$rut.'", "'.$email.'", "'.$phone.'", "'.$comuna.'", "'.$ocupacion.'", "'.$carrera.'", "0", "'.$_REQUEST['nombreBanco'].'", "'.$precio.'", now(), "0", "", "'.$id_transaccion.'", "'.$idCurso.'")');
        $sql->execute();

        $json = khipu_get_new_payment($_REQUEST['email'], $_REQUEST['bankId'], $precio, $id_transaccion);
        $data = urlencode($json);

        require_once('views/layout.php');
    }

    public function cursoayudahijosenfermedadesrespiratoriasfinish() {
        $this->pageTitle = 'Medidas para mitigar y controlar los efectos de una enfermedad respiratoria | Cognitivo';
        $this->pageDescription = "Curso que entrega herramientas a los padres para poder mitigar y controlar los efectos de una enfermedad respiratoria.";
        $this->pageKeywords = "Curso enferemedades respiratorias, kinesiología";
        $this->page = 'views/home/curso-ayuda-hijos-enfermedades-respiratorias-finish.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function cursoayudahijosenfermedadesrespiratoriasnotifyjs() {
        $my_receiver_id = 55616;
        //$my_receiver_id = 169939; // Modo desarrollador

        // Leer los parametros enviados por khipu
        $api_version = $_POST['api_version'];
        $receiver_id = $_POST['receiver_id'];
        $notification_id = $_POST['notification_id'];
        $subject = $_POST['subject'];
        $amount = $_POST['amount'];
        $currency = $_POST['currency'];
        $custom = $_POST['custom'];
        $transaction_id = $_POST['transaction_id'];
        $payer_email = $_POST['payer_email'];
        $notification_signature = $_POST['notification_signature'];

        // Creamos el string para enviar
        $to_send = 'api_version=' . urlencode($api_version) .
            '&receiver_id=' . urlencode($receiver_id) .
            '&notification_id=' . urlencode($notification_id) .
            '&subject=' . urlencode($subject) .
            '&amount=' . urlencode($amount) .
            '&currency=' . urlencode($currency) .
            '&transaction_id=' . urlencode($transaction_id) .
            '&payer_email=' . urlencode($payer_email) .
            '&custom=' . urlencode($custom);

        $ch = curl_init("https://khipu.com/api/1.2/verifyPaymentNotification");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $to_send . "&notification_signature=" . urlencode($notification_signature));
        $response = curl_exec($ch);
        curl_close($ch);

        $line = "Validacion remota [Message: $to_send, Signature: $notification_signature, Valid: $response]\n";

        $myFile = 'curso-ayuda-hijos-enfermedades-respiratorias-khipu-js.log';
        $fh = fopen($myFile,'a') or die("can't open file");
        fwrite($fh, print_r($_REQUEST, true));
        fwrite($fh, $line);

        if ($transaction_id == 'demo-js-transaction-1' && $response == 'VERIFIED' && $receiver_id == $my_receiver_id) {
            $headers = 'From: "Curso Cognitivo" <no-responder@khipu.com>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $subject = 'Pago exitoso Curso Cognitivo';
            $body = <<<EOF
Hola<br/>
<br/>
<p>
Recibes este correo pues el pago fue conciliado por Khipu.
</p>
<br><br>Atentamente,<br>Equipo Cognitivo<br><img src='dist/images/logo-hor.png'>
EOF;
            mail($custom, $subject, $body, $headers);
            fwrite($fh, "Enviado $subject a $custom");
        }
        fclose($fh);

    }








    public function cursoredsensorialteanuevasestrategias() {
        $this->pageTitle = 'TEA: Nuevas estrategias de intervención multidisciplinaria | Cognitivo';
        $this->pageDescription = "Seminario para profesionales que aborda las nuevas estrategias de intervención multidisciplinarias en niños con TEA.";
        $this->pageKeywords = "Curso, Autismo, TEA, Intervención multidisciplinaria";
        $this->page = 'views/home/curso-red-sensorial-tea-nuevas-estrategias.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function cursoredsensorialteanuevasestrategiasprocess() {
        $this->pageTitle = 'TEA: Nuevas estrategias de intervención multidisciplinaria | Cognitivo';
        $this->pageDescription = "Seminario para profesionales que aborda las nuevas estrategias de intervención multidisciplinarias en niños con TEA.";
        $this->pageKeywords = "Curso, Autismo, TEA, Intervención multidisciplinaria";
        $this->page = 'views/home/curso-red-sensorial-tea-nuevas-estrategias-process.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        $name		= sanear_string($_POST['name']);
        $rut		= $_POST['rut'];
        $email 		= $_POST['email'];
        $phone 		= $_POST['phone'];
        $comuna 	= $_POST['comuna'];
        $ocupacion 	= "";
        $carrera 	= "";
        $id_transaccion 	= rand(10000, 99999);
        $bankId 	= $_POST['bankId'];
        $nombreBanco 	= $_POST['nombreBanco'];

        $precio		= 100000;
        $idCurso	= 9;

        if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
            header('Location: index.php?invalid=true');
            return;
        }

        date_default_timezone_set("America/Santiago");


        if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare('INSERT INTO `inscritos`(`name`, `rut`, `email`, `phone`, `COMUNA`, `ocupacion`, `carrera`, `pagado`, `banco`, `precio`, `fecha`, `llamado`, `comentario`, `id_transaccion`, `ID_CURSO`) VALUES ("'.$name.'", "'.$rut.'", "'.$email.'", "'.$phone.'", "'.$comuna.'", "'.$ocupacion.'", "'.$carrera.'", "0", "'.$_REQUEST['nombreBanco'].'", "'.$precio.'", now(), "0", "", "'.$id_transaccion.'", "'.$idCurso.'")');
        $sql->execute();

        $json = khipu_get_new_payment($_REQUEST['email'], $_REQUEST['bankId'], $precio, $id_transaccion);
        $data = urlencode($json);

        require_once('views/layout.php');
    }

    public function cursoredsensorialteanuevasestrategiasfinish() {
        $this->pageTitle = 'TEA: Nuevas estrategias de intervención multidisciplinaria | Cognitivo';
        $this->pageDescription = "Seminario para profesionales que aborda las nuevas estrategias de intervención multidisciplinarias en niños con TEA.";
        $this->pageKeywords = "Curso, Autismo, TEA, Intervención multidisciplinaria";
        $this->page = 'views/home/curso-red-sensorial-tea-nuevas-estrategias-finish.php';
        $this->navbar = 'navbar-interior.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }

    public function cursoredsensorialteanuevasestrategiasnotifyjs() {
        $my_receiver_id = 55616;
        //$my_receiver_id = 169939; // Modo desarrollador

        // Leer los parametros enviados por khipu
        $api_version = $_POST['api_version'];
        $receiver_id = $_POST['receiver_id'];
        $notification_id = $_POST['notification_id'];
        $subject = $_POST['subject'];
        $amount = $_POST['amount'];
        $currency = $_POST['currency'];
        $custom = $_POST['custom'];
        $transaction_id = $_POST['transaction_id'];
        $payer_email = $_POST['payer_email'];
        $notification_signature = $_POST['notification_signature'];

        // Creamos el string para enviar
        $to_send = 'api_version=' . urlencode($api_version) .
            '&receiver_id=' . urlencode($receiver_id) .
            '&notification_id=' . urlencode($notification_id) .
            '&subject=' . urlencode($subject) .
            '&amount=' . urlencode($amount) .
            '&currency=' . urlencode($currency) .
            '&transaction_id=' . urlencode($transaction_id) .
            '&payer_email=' . urlencode($payer_email) .
            '&custom=' . urlencode($custom);

        $ch = curl_init("https://khipu.com/api/1.2/verifyPaymentNotification");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $to_send . "&notification_signature=" . urlencode($notification_signature));
        $response = curl_exec($ch);
        curl_close($ch);

        $line = "Validacion remota [Message: $to_send, Signature: $notification_signature, Valid: $response]\n";

        $myFile = 'curso-red-sensorial-tea-nuevas-estrategias-khipu-js.log';
        $fh = fopen($myFile,'a') or die("can't open file");
        fwrite($fh, print_r($_REQUEST, true));
        fwrite($fh, $line);

        if ($transaction_id == 'demo-js-transaction-1' && $response == 'VERIFIED' && $receiver_id == $my_receiver_id) {
            $headers = 'From: "Curso Cognitivo" <no-responder@khipu.com>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $subject = 'Pago exitoso Curso Cognitivo';
            $body = <<<EOF
Hola<br/>
<br/>
<p>
Recibes este correo pues el pago fue conciliado por Khipu.
</p>
<br><br>Atentamente,<br>Equipo Cognitivo<br><img src='dist/images/logo-hor.png'>
EOF;
            mail($custom, $subject, $body, $headers);
            fwrite($fh, "Enviado $subject a $custom");
        }
        fclose($fh);

    }


























    public function error() {
        $this->pageTitle = 'Error | Cognitivo';
        $this->pageDescription = "Cognitvo centre de terapias especialista en TEA.";
        $this->pageKeywords = 'TEA, autismo, terapias';
        $this->page = 'views/error/error.php';
        $this->navbar = 'navbar.php';
        $this->navbarfooter = 'navbar-footer.php';

        require_once('views/layout.php');
    }
}