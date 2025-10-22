<?php
include 'JDBC/conexion.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $action=$_POST['action'];
    if($action=="none"){
        echo "no seleccionaste una opcion";
    }else{
        $tabla= $_POST["valor_tabla"];

        if($tabla==ambos ){
            ="usuario u join ventas v on u.id = v.id";
        }

    }
    
    ?>
    <br>
    <a href="./index.php">regresar de pagina</a>
</body>
</html>