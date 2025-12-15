<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio</title>
</head>

<body>
    <?php
    $name_db = "login_post";
    $dns = "mysql:host=localhost;
            dbname=$name_db;
            charset=utf8";
    $user = 'root';
    $passwd = 'Kawaii_456';
    try {
        $pdo = new PDO($dns, $user, $passwd);
        // Configurar para que lance excepciones en caso de error
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// esto no se usarlo para nada... explicame 
        echo "Conexión exitosa";
    } catch (Exception $e) {
        echo "Conexión fallida<br>";
        die("conexion fallida" . $e->getMessage());
    }
    ?>
    <form action="ejercicio7.php" method="post">
        usuario : <input type="text" name="usuario" id="usuario" autocomplete="off"> <br>
        nombre : <input type="text" name="nombre" id="nombre" autocomplete="off">
        <input type="submit" value="send">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $usuario = $_POST['usuario'] ?? '';
        $nombre = $_POST['nombre'] ?? '';
        $sql = "INSERT INTO usuarios (usuario, nombre) VALUES (:usuario, :nombre)";
        $pstm = $pdo->prepare($sql);
        $pstm->execute([
            'usuario' => $usuario,
            'nombre' => $nombre
        ]);
    }

    $sql2 = "select * from usuarios";
    $pstm2 = $pdo->prepare($sql2);
    $pstm2->execute();
    foreach ($pstm2 as $fila) {
        echo " id : $fila[id]<br>
        usuario : $fila[usuario]<br>
        nombre : $fila[nombre]<br><br>";
    }
    
    ?>
    <?php
    $name_db = "login_post";
    $dsn = "mysql:host=localhost;dbname=$name_db;charset=utf8";
    $user = 'root';
    $passwd = 'Kawaii_456';

    try {
        $pdo = new PDO($dsn, $user, $passwd, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        echo "Conexión exitosa";
    } catch (Exception $e) {
        die("Conexión fallida: " . $e->getMessage());
    }

    // Procesar formulario por POST
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $usuario = $_POST['usuario'] ?? '';
        $nombre = $_POST['nombre'] ?? '';
        // Validación mínima (mejor sería usar trim y más filtros)
        if ($usuario && $nombre) {
            $sql = "INSERT INTO usuarios (usuario, nombre) VALUES (:usuario, :nombre)";
            $pstm = $pdo->prepare($sql);
            $pstm->execute([
                'usuario' => $usuario,
                'nombre' => $nombre
            ]);
        }
    }
    // Listar todos
    echo "<h3>Usuarios registrados:</h3>";
    $sql2 = "SELECT * FROM usuarios ORDER BY id DESC";
    foreach ($pdo->query($sql2) as $fila) {
        echo "<b>id:</b> {$fila['id']} <b>usuario:</b> {$fila['usuario']} <b>nombre:</b> {$fila['nombre']}<br>";
    }
    ?>
</body>

</html>