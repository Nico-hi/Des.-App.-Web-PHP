<?php
include './db/connection.php';
$sql='select * from city';
$result=$con->query($sql);
$num_rows=$result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vuelos</title>
</head>

<body>
    <h1>BUSCAR VUELOS</h1>
    <form action="search_fly.php" metod="get">
        <label for="origen"> origen : 
            <input type="text" name="origen" id="origen" required>
        </label>
        <label for="destino"> destino : 
            <input type="text" name="destino" id="destino" required>
        </label>
        <label for="fecha"> fecha : 
            <input type="date" name="fecha" id="fecha">
        </label>
        <input type="submit" value="BUSCAR">
    </form>
    <h2>Nuestros Destinos</h2>
    <?php 

    if($num_rows>0){
        echo '<ul>';
        while($row=$result->fetch_assoc()){
            echo '<li>'.$row['name_c'].'</li>';
        }
        echo '</ul>';

    }
    
    ?>
</body>

</html>