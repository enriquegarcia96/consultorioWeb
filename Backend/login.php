<?php
    require_once '../Conexion/Conexion.php';
    session_start();

    //if (empty($_POST['TipoUsuario']) and empty($_POST['Contrasena'])){}
    $TipoUsuario = $_POST['TipoUsuario'];
    $Contrasena = $_POST['Contrasena'];

    //$prepare = Conexion::abriendoConexion()->prepare("select * from usuario where TipoUsuario = ? and Contrasena = ?");
    $prepare = Conexion::abriendoConexion()->prepare("select * from usuario  where TipoUsuario = '$TipoUsuario' and Contrasena = '$Contrasena' ");

    //$prepare->bindParam(1,$TipoUsuario);
    //$prepare->bindParam(2,$Contrasena);

    //$prepare->executeQuery();


    //$prepare->setFetchMode(PDO::FETCH_ASSOC);


    $prepare->execute();
    $prepare->setFetchMode(PDO::FETCH_ASSOC);




    if ($prepare == true) {
        $_SESSION['TipoUsuario'] = $TipoUsuario;
        $_SESSION['Contrasena'] = $Contrasena;
        header('Location: ../index2.html');
        echo 'SIIIIIIIIIIIIIIIII';
    }else {
        echo 'NOOOOOOOOOOOOOOOOOOOO';
        $error_msg =  "E-Mail oder Passwort war ungültig<br><br>";
    }

?>