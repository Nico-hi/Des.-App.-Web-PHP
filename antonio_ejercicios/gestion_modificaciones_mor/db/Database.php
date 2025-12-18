<?php
class Database {
    private static $conn = null;

    public static function getConnection() {
        if (self::$conn === null) {
            $host = "localhost";
            $db   = "productos";
            $user = "root";
            $pass = "";
            $dsn = "mysql:host=$host;dbname=$db;charset=utf8";
            self::$conn = new PDO($dsn, $user, $pass);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        }
        return self::$conn;
    }
}
