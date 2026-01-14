<?php
class DataBase
{
    private static $conn ;
    public static function getConnection()
    {
        try {
            if (self::$conn === null) {
                $dns = "mysql:host=localhost;dbname=pre_examen;charset=utf8";
                $username = "root";
                $password = "";
                self::$conn = new PDO($dns, $username, $password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$conn;
        } catch (PDOException $e) {
            throw new Exception("error de conexion");
        }
    }
}