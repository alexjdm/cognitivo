<?php
/*Incluimos el fichero de la clase*/
require_once 'connections/db.php';
require_once 'helpers/CommonHelper.php';
require_once 'models/Usuario_DAO.php';
require "lib/phpmailer/class.phpmailer.php";

class accountController {

    public $model;
    public $page;

    public function login() {
        $this->pageTitle = "Cognitivo";
        $this->page = 'views/admin/account/login.php';
        require_once( 'views/admin/Shared/layoutLogin.php');
    }

    public function logout() {
        if (!isset($_SESSION)) {
            @session_start();
        }
        session_destroy();

        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $link = "http://$_SERVER[SERVER_NAME]/admin/index.php";
        //require_once('views/account/login.php');
        //header("Location: index.php");
        echo '<script type="text/javascript">
        window.location.assign("../../index.php");
        </script>';
    }

    public function remember() {
        require_once('views/account/remember.php');
    }

    public function rememberMail() {
        $email = $_GET['email'];
        $password = $this->randomPassword();

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE CORREO_ELECTRONICO=:EMAIL AND HABILITADO=1");
        $sql->execute(array('EMAIL' => $email));
        $resultado = $sql->fetch();

        if ($resultado != null) {

            $sql = $pdo->prepare("UPDATE usuarios set CLAVE_USUARIO =:PASSWORD WHERE ID_USUARIO=:ID_USUARIO");

            if ($sql->execute(array('PASSWORD' => md5($password), 'ID_USUARIO' => $resultado['ID_USUARIO']))) {

                $correo = new PHPMailer(); //Creamos una instancia en lugar usar mail()

                //Usamos el SetFrom para decirle al script quien envia el correo
                $correo->SetFrom("info@fxlogos.com", "FxLogos");

                //Usamos el AddReplyTo para decirle al script a quien tiene que responder el correo
                $correo->AddReplyTo("no-reply@fxlogos.com","FxLogos");

                //Usamos el AddAddress para agregar un destinatario
                //$correo->AddAddress($mail, $nombre);
                $correo->AddAddress($email);

                $e_subject = "Nueva Contraseña";
                $e_body = "Hola ". $resultado['NOMBRE'] . ".<br><br>" . PHP_EOL . PHP_EOL;
                $e_content = "Tu nueva contraseña es: " . $password . "<br><br>Saludos,<br>FxLogos" . PHP_EOL . PHP_EOL;

                $msg = wordwrap( $e_body . $e_content, 70 );

                //Ponemos el asunto del mensaje
                $correo->Subject = utf8_decode($e_subject);

                /*
                 * Si deseamos enviar un correo con formato HTML utilizaremos MsgHTML:
                 * $correo->MsgHTML("<strong>Mi Mensaje en HTML</strong>");
                 * Si deseamos enviarlo en texto plano, haremos lo siguiente:
                 * $correo->IsHTML(false);
                 * $correo->Body = "Mi mensaje en Texto Plano";
                 */
                $correo->MsgHTML($msg);

                //Enviamos el correo
                if(!$correo->Send())
                {
                    $status  = "error";
                    $message = "Hubo un error: " . $correo->ErrorInfo;
                }
                else {
                    $status  = "success";
                    $message = "Correo Enviado. Revisa tu bandeja de correos y encontrarás tu nueva contraseña.";
                }

            }
            else
            {
                $status  = "error";
                $message = "Ha ocurrido un error, por favor intenta nuevamente.";
            }

        }
        else {
            $status  = "error";
            $message = "Este correo no existe.";
        }

        $data = array(
            'status'  => $status,
            'message' => $message
        );

        echo json_encode($data);

        Database::disconnect();
    }

    /**
     *
     */
    public function dologin() {

        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

        //Inicio de variables de sesión
        if (!isset($_SESSION)) {
            @session_start();
        }

        //Recibir los datos ingresados en el formulario
        $email = $_POST['email']; //echo $email;
        $password = md5($_POST['password']); //echo $password;

        $usuarioDAO = new Usuario_DAO();
        echo $usuarioDAO -> doLogin($email, $password);
    }

    public function error() {
        require_once('views/error/error.php');
    }

    private function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

}