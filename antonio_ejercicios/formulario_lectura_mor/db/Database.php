<?php
class Database
{
    private static $conn = null;

    public static function getConnection()
    {
        // esta es una funcion que creamos para poder llamar la conexion desde fuera
// si no se creo una conexion
        if (self::$conn === null) {
            $username = "root";
            $password = "Kawaii_456";
            
            $servername = "localhost";
            $dbname = "virtual_store";
            $dns ="mysql:host=$servername;dbname=$dbname;charset=utf8";

            self::$conn = new PDO(
                $dns,
                $username,
                $password
            );
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;

    }
}
