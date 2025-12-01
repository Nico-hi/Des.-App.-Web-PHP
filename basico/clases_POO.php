<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO</title>
</head>
<body>
    
<h2>O1) Clase Persona:</h2>
<p>Define una clase llamada "Persona" con las siguientes propiedades: <br>
- Nombre<br>
- Edad<br>
La clase debe tener un método llamado "presentarse" que imprima en pantalla un mensaje que diga "Hola, soy [Nombre] y tengo [Edad] años." Crea dos objetos de la clase "Persona" y llama al método "presentarse" de cada uno. </p>

<?php
class persona{
    public $nombre;
    public $edad;
    
    public function __construct($nombre,$edad){//esto es el contructo igual que java... solo que hay que poner function __contructor
        $this->nombre=$nombre;
        $this->edad=$edad;
    }
    function presentarse(){// funcion para presentarse
        return "Hola, soy ".$this->nombre." y tengo ".$this->edad." años";
    }
}

$persona1= new persona("juan",17);
$persona2= new persona("alonzo",40);

echo $persona1->presentarse()."<br>".$persona2->presentarse();

?>

<h2>O2) Clase Rectángulo:</h2>
<p>Define una clase llamada "Rectangulo" con las siguientes propiedades:<br>
- Base<br>
- Altura<br>
La clase debe tener un método llamado "calcularArea" que devuelva el área del rectángulo (Base * Altura).Crea dos objetos de la clase "Rectangulo" con diferentes valores de base y altura, llama al método "calcularArea" para cada uno e imprime el resultado.</p>


<?php
class rectangulo{
    public $base;
    public $altura;

    public function __construct($base,$altura){
        $this->base=$base;
        $this->altura=$altura;
    }

    function calcularArea() {
        return "el area del rectangulo de $this->base de base y $this->altura de altura es --> ".$this->base * $this->altura;
        
    }

}

$rectangulo1 = new rectangulo(2,6);
$rectangulo2 =new rectangulo(4,7);

echo $rectangulo1->calcularArea()."<br>".$rectangulo2->calcularArea();

?>


<h2>calse destruct</h2>
<?php
/*
tenemos la clase __destruct  que se ejecuta al finalizar ejm

function __destruct(){
return "aqui tenemos que poner lo que queremos que salga , despues de inicializar la variable" ;
}


al terminar la inicializacion de la variable salta automaticamente el __destruct

IGUAL QUE JAVA TENEMOS LOS 
- public => puede ser llamado por todo el codigo
- protected => funciona dentro y/o si otra clase hereda de la protected     
- private => solo funcoina dentro del codigo o ocntructor en el cual estamos usando
*/


?>
</body>
</html>