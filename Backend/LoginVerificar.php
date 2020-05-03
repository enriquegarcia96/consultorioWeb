<?php
    require_once '../Conexion/Conexion.php';


class LoginVerificar{
    private $TipoUsuario;
    private $Contrasena;

    public function  entrandoLogin(){
        $this->TipoUsuario = $_POST['TipoUsuario'];
        $this->Contrasena = $_POST['Contrasena'];
        $entrando = new  LoginVerificar();
        $testeo = $entrando->validar($this->TipoUsuario, $this->Contrasena);

        if (!$testeo){
            header('Location: ../index.php');
        }else{
            session_start();
            $_SESSION['TipoUsuario'] = $this->TipoUsuario;;
            $_SESSION['Contrasena']  = $this->Contrasena;;
            header('Location: ../index2.html');
        }
    }

    public function validar($TipoUsuario, $Contrasena){

        try {
            $sentencia = Conexion::abriendoConexion()->prepare("select TipoUsuario, Contrasena from usuario where TipoUsuario = ? and Contrasena = ?");
            $sentencia->bindParam(1,$TipoUsuario,PDO::FETCH_ASSOC);
            $sentencia->bindParam(2,$Contrasena,PDO::FETCH_ASSOC);
            $sentencia->execute();
            $result = $sentencia->fetchAll();
            var_dump($result);
            if ($result[0] > 0){
                return true;
            }
        }catch (PDOException $exception){
            echo "No se puedo conectar ". $exception->getMesage();
        }

        return false;
    }


}