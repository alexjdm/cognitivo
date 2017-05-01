<?php


class ClienteModel
{
    public function getClientesList(){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM clientes WHERE HABILITADO='1'");
        $sql->execute();

        return $sql->fetchAll();
    }

    public function getCliente($idCliente){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM clientes WHERE ID_CLIENTE=:ID_CLIENTE AND HABILITADO=:HABILITADO");
        $sql->execute(array('ID_CLIENTE' => $idCliente, 'HABILITADO' => 1));

        return $sql->fetchAll()[0];
    }

    public function editCliente($idCliente, $nombre, $apellido, $email, $telefono, $idEmpresa){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("UPDATE clientes set NOMBRE_CLIENTE =:NOMBRE, APELLIDO_CLIENTE =:APELLIDO, CORREO_ELECTRONICO =:CORREO_ELECTRONICO, TELEFONO =:TELEFONO, ID_EMPRESA =:ID_EMPRESA WHERE ID_CLIENTE=:ID_CLIENTE");

        if ($sql->execute(array('NOMBRE' => $nombre, 'APELLIDO' => $apellido, 'CORREO_ELECTRONICO' => $email, 'TELEFONO' => $telefono, 'ID_EMPRESA' => $idEmpresa, 'ID_CLIENTE' => $idCliente ))) {
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

    public function deleteCliente($idCliente){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("UPDATE clientes set HABILITADO =:HABILITADO WHERE ID_CLIENTE=:ID_CLIENTE");

        if ($sql->execute(array('HABILITADO' => 0, 'ID_CLIENTE' => $idCliente ))) {
            $status  = "success";
            $message = "El cliente ha sido eliminado";
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

    public function newCliente($nombre, $apellido, $email, $telefono, $idEmpresa){

        if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

        if(!$this->isEmail($email)) {
            $status  = "error";
            $message = "Has ingresado una dirección de correo electrónico no válido, intenta nuevamente.";
        }
        else{
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = $pdo->prepare("SELECT * FROM clientes WHERE CORREO_ELECTRONICO=:EMAIL");
            $sql->execute(array('EMAIL' => $email));
            $resultado = $sql->fetch();

            if ($resultado == null) {

                $sql = $pdo->prepare("INSERT INTO `clientes`(`NOMBRE_CLIENTE`, `APELLIDO_CLIENTE`, `CORREO_ELECTRONICO`, `TELEFONO`, `ID_EMPRESA`, `HABILITADO`) VALUES (:nombre,:apellido,:correo,:telefono,:idEmpresa,'1')");
                $sql->execute(array('nombre' => $nombre, 'apellido' => $apellido, 'correo' => $email, 'telefono' => $telefono, 'idEmpresa' => $idEmpresa));
                $id = $pdo->lastInsertId();

                if(!empty($id)) {
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
            'message' => $message
        );

        echo json_encode($data);

        Database::disconnect();
    }

    // Email address verification, do not edit.
    private function isEmail($email) {
        return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
    }

}