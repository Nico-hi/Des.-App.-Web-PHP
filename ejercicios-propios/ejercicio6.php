<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio6</title>
</head>

<body>

    <form action="ejercicio6.php" method="get">email :
        <input type="email" name="email" id="email"> <br> age :
        <input type="number" name="age" id="age">
        <input type="submit" value="send">
    </form>
    <?php
    //$email = $this->input->get("email");
    $email = $_GET["email"] ?? '';
    $age = $_GET['age'] ?? 0;
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && $age >= 0) {
        $_SESSION['email'] = $email;
        $_SESSION['age'] = $age;
    } else {
        echo "<script>
            alert('escribiste un campo mal...')
        </script>";
    }

    if (isset($_SESSION['email']) && isset($_SESSION['age'])) {
        echo "email -> " . $_SESSION["email"] . "<br> age -> " . $_SESSION["age"] . "<br>";
    }
    var_dump($_SESSION)
        ?>

    <?php
    session_start();
    $email = $_GET['email'] ?? '';
    $age = $_GET['age'] ?? '';
    $errores = [];

    // Validar email y age de forma clara
    if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL))
        $errores[] = "El correo no es válido.";
    if (!is_numeric($age) || $age < 0)
        $errores[] = "La edad debe ser un número positivo.";

    if (empty($errores)) {
        $_SESSION['email'] = $email;
        $_SESSION['age'] = $age;
        echo "email -> " . $_SESSION['email'] . "<br> age -> " . $_SESSION['age'] . "<br>";
    } else {
        foreach ($errores as $err) {
            echo "<b>$err</b><br>";
        }
    }

    // Depuración, ¡quítalo para producción!
    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";
    ?>
</body>

</html>