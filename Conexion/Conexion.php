<?php

class Conexion{

    public static function abriendoConexion(){

        try{
            $conexion = new PDO("mysql:host=localhost;dbname=sistema_bancario;charset=UTF8","root","Dragon97");
        } catch (PDOException $exception){
            echo "No se puedo conectar ". $exception->getMesage();
        }
        return $conexion;
    }
}