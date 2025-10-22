<?php
$num1 = $_GET['num1'];
$num2 = $_GET['num2'];
$operacion = $_GET['operacion'];
if($operacion == null ) {
    /*
    || $operacion != "suma" || $operacion != "resta" || $operacion != "multiplicar" || $operacion != "dividir"
    */
    echo '<script>alert("Operación no válida"); window.location.href = "index.html";</script>';
    exit();

}else{
switch ($operacion) {
    case 'suma':
        $resultado = $num1 + $num2;
        break;
    case 'restar':
        $resultado = $num1 - $num2;
        break;
    case 'multiplicar':
        $resultado = $num1 * $num2;
        break;
    case 'dividir':
        if ($num2 != 0) {
            $resultado = $num1 / $num2;
        } else {
            $resultado = "Error: División por cero";
        }
        break;
    default:
        $resultado = "Operación no válida";
        break;
}

echo "El resultado de la operación es: " . $resultado;
}

echo '<br><br><a href="index.html">Volver</a>';
?>