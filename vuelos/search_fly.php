<?php
include './db/connection.php';

function sacar_id($name, $con)
{
    $sql = "select id_c from city where name_c = '$name' ";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    return $row['id_c'];
}
$origen = $_GET["origen"];
$destino = $_GET["destino"];
$fecha=$_GET['fecha'];
$name_cookie=$origen."-".$destino;

$origen_p = sacar_id($origen, $con);
$destino_p = sacar_id($destino, $con);
$sql = "select price_f from flights where id_o = $origen_p and id_d = $destino_p";
$result = $con->query($sql);
$row=$result->fetch_assoc();
$price=$row['price_f'];
if(isset($_COOKIE[$name_cookie])){
#    echo "$_COOKIE[$name_cookie]";
    $busquedas=$_COOKIE[$name_cookie]+1;
    setcookie($name_cookie,$busquedas,0,"/");
    $price*=1.3*$busquedas;
}else{
    setcookie($name_cookie,1,0,"/");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body> 
    <h2>vuelo : <?= $name_cookie?></h2>
    <p>con un precio de <?= $price?></p>
</body>

</html>