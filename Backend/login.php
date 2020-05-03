<?php
    require_once '../Conexion/Conexion.php';

    if (isset($_POST['TipoUsuario']) && isset($_POST['Contrasena'])) {
        $tipoUsuario = $_POST['TipoUsuario']; 
        $contrasena = $_POST['Contrasena'];

        $sentencia = Conexion::abriendoConexion()->prepare("select TipoUsuario, Contrasena from usuario where TipoUsuario = ? and Contrasena = ?");
        
        $sentencia->bindParam(1,$tipoUsuario,PDO::FETCH_ASSOC);//mando los datos obtenidos 
        $sentencia->bindParam(2,$contrasena,PDO::FETCH_ASSOC);//desde html 
        $sentencia->execute();//ejecuto la consulta prepare
        $row = $sentencia->fetchAll();//la consulta lo convierto en un arreglo asociativo

        //var_dump($row);
        //si el arreglo que se ejecuto es mayor a 0 , significa que trajo un valor
        if ($row [0] > 0) {
            session_start();
            $_SESSION['TipoUsuario'] = $tipoUsuario;
            $_SESSION['Contrasena']  = $contrasena;
            
            header('Location: ../index2.html');
        }else{
            header('Location: ../index.php');
        }

    }
?>