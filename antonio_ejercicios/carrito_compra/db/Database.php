<?php
class Database
{
    private static $conn = null;

    public static function getConnection()
    {
        try {
            if (self::$conn === null) {
                $dsn = "mysql:host=localhost;dbname=productos;charset=utf8";
                try {
                    self::$conn = new PDO($dsn, "root", "root");
                    #self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
                    # esto es mejor para depurara
                    self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    } catch (PDOException $e) {
                        throw new Exception("error de conexion");
                    }
            }
            return self::$conn;
        } catch (Exception $e) {
            error_log("Error de conexión: " . $e->getMessage());
            return null;
        }
    }
}
