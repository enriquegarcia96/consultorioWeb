<?php

class Conexion{
    private $host = "localhost";
    private $user = "root";
    private $pass = "Dragon97";
    private $base = "consultorio_juridico_unicah";


    public static function abriendoConexion(){


        try{
            $conexion = new PDO("mysql:host=localhost;dbname=consultorio_juridico_unicah;charset=UTF8","root","Dragon97");
        } catch (PDOException $exception){
            echo "No se puedo conectar ". $exception->getMesage();
        }
        return $conexion;
    }

}
