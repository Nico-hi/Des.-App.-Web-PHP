<?php
$name_server="localhost";
$user_server="root";
$passwd_server="Kawaii_456";
$name_bbdd="ejercicio_php";

$con=new mysqli($name_server,$user_server,$passwd_server,$name_bbdd);

if($con->connect_error){
    die("hubo un error en la coneccion de la BBDD si quieres sabe cual es el error aqui esta --> ".$con->connect_error);
}
?>