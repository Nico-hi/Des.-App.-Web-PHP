<?php
// Iniciamos una sesión PHP o reanudamos la sesión actual si existe una
session_start();

// Destruimos todos los datos registrados en la sesión actual
// Esto incluye borrar todas las variables de sesión y eliminar la cookie de sesión asociada al cliente
session_destroy();

// Enviamos una cabecera HTTP para redirigir al usuario a la página de inicio del sitio web (index.php)
header('Location: index.php');

// Detenemos la ejecución del script de forma inmediata
exit;
?>
