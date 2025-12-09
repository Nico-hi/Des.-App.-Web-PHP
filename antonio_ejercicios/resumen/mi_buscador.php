<?php
include "conexion.php";

$texto = htmlspecialchars($_POST["busqueda"]);
$resultados = [];

$sql = "select name_p, price_p from product where name_p like ?";
$pstm = $conn->prepare($sql);
$pstm->bind_param("s",$texto);
$pstm->execute();// ejecutamos la consulta
$resultado = $pstm->get_result();// obtenos lo que la consulta tuvo

if ($resultado && $resultado->num_rows > 0) { // si el numero de filas es mayor que 0, es que encontro dicho producto
    while ($row = $resultado->fetch_assoc()) {
        $resultados[] = $row;
    }

} else {// sino no encuentra ningun producto 
    $resultados[] = [
        "status" => "error",
        "message" => "no se encontro dicho producto"
    ];
}

header("Content-Type: application/json"); // informamos por el header que el archivo que enviamos sera un JSON 
echo json_encode($resultados); // hacemos el envio a el frontend de JS