<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda";

// Crear conexión, devolviendo una instancia de la clase mysqli en la variable $conn
$conexion = new mysqli($servername, $username, $password, $dbname);
// Verificar conexión viendo si devuelve datos propiedad $conn->connect_error
// Si todo ha ido bien, no devuelve nada y no ejecuta el interior del if
if ($conexion->connect_error) {
    //die termina la ejecución del script
    die("Conexión fallida: " . $conexion->connect_error);
}
?>