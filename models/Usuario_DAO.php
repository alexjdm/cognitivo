<?php

/**
 * Created by PhpStorm.
 * User: alexj
 * Date: 12-04-2016
 * Time: 20:03
 */
class Usuario_DAO
{

    public function doLogin($email, $password)
    {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $pdo->prepare("SELECT * FROM usuario WHERE CORREO_ELECTRONICO=:EMAIL AND CLAVE_USUARIO=:PASSWORD AND HABILITADO=1");
        $sql->execute(array('EMAIL' => $email, 'PASSWORD' => $password));
        $resultado = $sql->fetch();
        //print_r($resultado);

        if ($resultado != null) {

            //Definimos las variables de sesión y redirigimos a la página de usuario
            $_SESSION['id'] = $resultado['ID_USUARIO'];
            $_SESSION['nombre'] = $resultado['NOMBRE'];
            $_SESSION['apellido'] = $resultado['APELLIDO'];
            $_SESSION['correo'] = $resultado['CORREO_ELECTRONICO'];
            $_SESSION['password'] = $resultado['CLAVE_USUARIO'];
            $_SESSION['image'] = $resultado['IMAGE'];
            $_SESSION['idPerfil'] = $resultado['ID_PERFIL'];

            $status  = "success";
            $message = "Usuario registrado.";
        } else {
            $sql = $pdo->prepare("SELECT * FROM usuario WHERE CORREO_ELECTRONICO=:EMAIL AND HABILITADO=1");
            $sql->execute(array('EMAIL' => $email));
            $resultado = $sql->fetch();

            if ($resultado != null) {
                $status  = "error";
                $message = "Clave incorrecta.";
            }
            else
            {
                $status  = "error";
                $message = "Usuario no registrado.";
            }
        }

        $data = array(
            'status'  => $status,
            'message' => $message
        );

        Database::disconnect();

        return json_encode($data);
    }

    public function getUsersList(){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM usuario WHERE HABILITADO='1'");
        $sql->execute();

        return $sql->fetchAll();
    }

    public function getPacientes(){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM usuario WHERE ID_PERFIL = 1 AND HABILITADO='1'");
        $sql->execute();

        return $sql->fetchAll();
    }

    public function getApoderados(){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM usuario WHERE ID_PERFIL = 2 AND HABILITADO='1'");
        $sql->execute();

        return $sql->fetchAll();
    }

    public function getProfesionales(){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM usuario WHERE ID_PERFIL = 3 AND HABILITADO='1'");
        $sql->execute();

        return $sql->fetchAll();
    }

    public function getPacienteApoderado(){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM paciente_apoderado");
        $sql->execute();

        return $sql->fetchAll();
    }

    public function getUserForContact(){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM usuario WHERE ID_PERFIL = 1 AND ID_PERFIL = 2 AND HABILITADO='1'");
        $sql->execute();

        return $sql->fetchAll();
    }

    public function getUser($idUsuario){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM usuario WHERE ID_USUARIO=:ID_USUARIO AND HABILITADO=:HABILITADO");
        $sql->execute(array('ID_USUARIO' => $idUsuario, 'HABILITADO' => 1));

        return $sql->fetchAll()[0];
    }

    public function editUser($idUsuario, $nombre, $apellido, $idEspecialidad, $fechaNac, $correoElectronico, $telefono1, $telefono2, $direccion, $perfil){

        if($fechaNac != null)
            $fechaNac = FormatearFechaEn($fechaNac);
        else
            $fechaNac = null;

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("UPDATE usuario set NOMBRE =:NOMBRE, APELLIDO =:APELLIDO, ID_ESPECIALIDAD =:ID_ESPECIALIDAD, CORREO_ELECTRONICO =:CORREO_ELECTRONICO, ID_PERFIL =:ID_PERFIL, TELEFONO1=:TELEFONO1, TELEFONO2=:TELEFONO2, DIRECCION=:DIRECCION, FECHA_NACIMIENTO=:FECHA_NACIMIENTO WHERE ID_USUARIO=:ID_USUARIO");

        if ($sql->execute(array(
            'NOMBRE' => $nombre,
            'APELLIDO' => $apellido,
            'ID_ESPECIALIDAD' => $idEspecialidad,
            'CORREO_ELECTRONICO' => $correoElectronico,
            'ID_PERFIL' => $perfil,
            'TELEFONO1' => $telefono1,
            'TELEFONO2' => $telefono2,
            'DIRECCION' => $direccion,
            'FECHA_NACIMIENTO' => $fechaNac,
            'ID_USUARIO' => $idUsuario
        ))) {
            $status  = "success";
            $message = "Los datos han sido actualizados.";
        }
        else
        {
            $status  = "error";
            $message = "Ha ocurrido un problema con la actualización de tu contraseña.";
        }

        $data = array(
            'status'  => $status,
            'message' => $message
        );

        echo json_encode($data);

        Database::disconnect();
    }

    public function changePasswordUser($idUsuario, $password){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("UPDATE usuario set CLAVE_USUARIO =:PASSWORD WHERE ID_USUARIO=:ID_USUARIO");

        if ($sql->execute(array('PASSWORD' => md5($password), 'ID_USUARIO' => $idUsuario))) {
            $status  = "success";
            $message = "Tu contraseña ha sido actualizada.";
        }
        else
        {
            $status  = "error";
            $message = "Ha ocurrido un problema con la actualización de tu contraseña.";
        }

        $data = array(
            'status'  => $status,
            'message' => $message
        );

        echo json_encode($data);

        Database::disconnect();
    }

    public function deleteUser($idUsuario){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("UPDATE usuario set HABILITADO =:HABILITADO WHERE ID_USUARIO=:ID_USUARIO");

        if ($sql->execute(array('HABILITADO' => 0, 'ID_USUARIO' => $idUsuario ))) {
            $status  = "success";
            $message = "El usuario ha sido eliminado";
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

    public function newUser($nombre, $apellido, $idEspecialidad, $fechaNac, $correo_electronico, $telefono1, $telefono2, $direccion, $perfil, $idPaciente){

        if($fechaNac != null)
            $fechaNac = FormatearFechaEn($fechaNac);

        if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

        $password = $this->randomPassword();

        if(!$this->isEmail($correo_electronico)) {
            $status  = "error";
            $message = "Has ingresado una dirección de correo electrónico no válido, intenta nuevamente.";
        }
        else{
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = $pdo->prepare("SELECT * FROM usuario WHERE CORREO_ELECTRONICO=:EMAIL");
            $sql->execute(array('EMAIL' => $correo_electronico));
            $resultado = $sql->fetch();

            if ($resultado == null) {

                $sql = $pdo->prepare("INSERT INTO `usuario`(`NOMBRE`, `APELLIDO`, `ESPECIALIDAD`, `CORREO_ELECTRONICO`, `CLAVE_USUARIO`, `HABILITADO`, `ID_PERFIL`, `TELEFONO1`, `TELEFONO2`, `DIRECCION`, `FECHA_NACIMIENTO`) VALUES (:nombre,:apellido,:idEspecialidad,:correo,:password,'1',:id_perfil,:telefono1,:telefono2,:direccion,:fechaNac)");
                $sql->execute(array('nombre' => $nombre, 'apellido' => $apellido, 'idEspecialidad' => $idEspecialidad, 'correo' => $correo_electronico, 'password' => md5($password), 'id_perfil' => $perfil, 'telefono1' => $telefono1, 'telefono2' => $telefono2, 'direccion' => $direccion, 'fechaNac' => $fechaNac));
                $id = $pdo->lastInsertId();

                if(!empty($id)) {
                    if($idPaciente != null && $idPaciente != "") {
                        // Ingresarlo como apoderado de...
                        $sql = $pdo->prepare("INSERT INTO `paciente_apoderado`(`ID_PACIENTE`, `ID_APODERADO`) VALUES ($idPaciente, $id)");
                        $sql->execute();
                    }

                    $status  = "success";
                    $message = "Registro exitoso.";
                }
                else{
                    $status  = "error";
                    $message = "Error con la base de datos, por favor intente nuevamente.";
                }

            }
            else{
                $status  = "error";
                $message = "Correo Electrónico ya se encuentra registrado.";
            }
        }

        $data = array(
            'status'  => $status,
            'message' => $message,
            'password' => $password
        );

        echo json_encode($data);

        Database::disconnect();
    }

    // Email address verification, do not edit.
    private function isEmail($email) {
        return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
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