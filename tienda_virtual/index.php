<?php
include 'JDBC/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Virtual</title>
</head>

<body>
    <h1>TiendaVirtual</h1>

    <div>
        <h3>TVs / Televisores</h3>
        <?php
        $sql1 = "select img_c_t from category where id_c=1 and name_c='TVs'";
        $result1 = $con->query($sql1);
        ?>
    </div>

    <div>
        <h3>Smartphones / Movíles</h3>
        <?php
        $sql2 = "select img_c_t from category where id_c=2 and name_c='Smartphones'";
        $result2 = $con->query($sql2);
        ?>
    </div>

    <div>
        <h3>PCs / Ordenadores de escritorio</h3>
        <?php
        $sql3 = "select img_c_t from category where id_c=3 and name_c='PCs'";
        $result3 = $con->query($sql3);
        ?>
    </div>

    <div>
        <h3>Laptops / Portatiles</h3>
        <?php
        $sql4 = "select img_c_t from category where id_c=4 and name_c='Laptops'";
        $result4 = $con->query($sql4);
        ?>
    </div>

    <div>
        <h3>Consoles / Consolas</h3>
        <?php
        $sql5 = "select img_c_t from category where id_c=5 and name_c='Consoles'";
        $result5 = $con->query($sql5);
        ?>
    </div>

</body>

</html>