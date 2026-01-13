<?php
class Database {
    private static $conn = null;

    public static function getConnection() {
        if (self::$conn === null) {
            $dsn = "mysql:host=localhost;dbname=productos;charset=utf8";
            self::$conn = new PDO($dsn, "root", "");
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        }
        return self::$conn;
    }
}
