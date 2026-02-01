<?php
class DataBase
{
    private static $conn;

    public static function getConnection()
    {
        if (self::$conn === null) {
            $dns = "mysql:host=localhost;dbname=examen2;charset=utf8";
            $usuario = "root";
            $contrasena = "";
            self::$conn = new PDO($dns, $usuario, $contrasena);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        return self::$conn;
    }
}