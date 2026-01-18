<?php 
session_start();
header("Content-Type: application/json");
$usuario = $_POST["usuario-ra"];
$contrasena = $_POST["contrasena-ra"];