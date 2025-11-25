<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Chuleta PHP para HTML y Repaso</title>
<style>
body { font-family: Arial, sans-serif; background:#f6fbff; color:#222; }
h2 { color:#1366b8; border-bottom:1px solid #eee; }
pre code {
  background: #232849;
  color: #eaf2fd;
  font-size:1.01em;
  border-radius:6px;
  padding: 1em;
  display:block;
  white-space: pre-wrap;
  margin-bottom:.8em;
}
.explicacion { background: #e9f5fe; padding:.65em .9em; margin-bottom:1em; border-left:4px solid #37c;}
li {margin-top:.18em;}
</style>
</head>
<body>

<h2>1. Sintaxis básica y salida</h2>
<div class="explicacion">
La instrucción <b>echo</b> muestra texto o variables.<br>
Puedes usar <b>Eco optimizado:</b> <code>&lt;?= "texto" ?&gt;</code> como atajo solo para mostrar.
</div>
<pre><code>
&lt;?php
echo "¡Hola mundo!";
?&gt;
&lt;?= "¡Hola mundo optimizado!" ?&gt;
</code></pre>

<h2>2. Variables y tipos</h2>
<div class="explicacion">
En PHP no declaras tipos, la variable los toma automáticamente.<br>
<b>Puedes cambiar tipo al vuelo:</b>
</div>
<pre><code>
&lt;?php
$nombre = "Ana";   // string
$edad = 21;        // int
$peso = 62.4;      // float
$activo = true;    // boolean
$nombre = 123;     // ahora es int
?&gt;
</code></pre>

<h2>3. Operadores</h2>
<div class="explicacion">
Operadores aritméticos y lógicos, y el ternario para usar condicional simple.
</div>
<pre><code>
&lt;?php
echo 2 + 3;      // 5
echo $edad > 18 ? "Mayor" : "Menor";
echo ($edad == 21); // true/false
echo ($edad === "21"); // false (compara tipo y valor)
?&gt;
</code></pre>

<h2>4. Strings y concatenación</h2>
<div class="explicacion">
Comillas dobles permiten variables dentro. Puedes concatenar con el punto <code>.</code>.
</div>
<pre><code>
&lt;?php
echo "Hola, $nombre";
echo 'Edad: ' . $edad;
?&gt;

<br>
$txt = "Hola mundo";
echo strlen($txt);                // Longitud = 10
echo strtoupper($txt);            // "HOLA MUNDO"
echo strtolower($txt);            // "hola mundo"
echo trim("  Hola  ");            // "Hola"
echo substr($txt, 0, 4);          // "Hola"
echo str_replace("Hola","Adios",$txt); // "Adios mundo"
$palabras = explode(" ",$txt);    // [ "Hola", "mundo" ]
$ctxt = implode(",", $palabras);  // "Hola,mundo"
echo strpos($txt, "mun");         // 5 (posición donde aparece "mun")

</code></pre>

<h2>5. Arrays: indexados, asociativos, multidimensionales</h2>
<div class="explicacion">
Un array puede tener índices numéricos o "claves" de texto.<br>
<b>Asociativos:</b> Ideales para definir pares clave/valor.
</div>
<pre><code>
&lt;?php
$colores = ["Rojo","Verde","Azul"];
echo $colores[0]; // Rojo

$persona = ["nombre"=>"Luis", "edad"=>19];
echo $persona["nombre"];

$grupo = [["Ana",8],["Luis",7]];
echo $grupo[0][0]; // Ana

foreach($persona as $clave=>$valor){
  echo "$clave: $valor";
}
?&gt;
<br>
$arr = [3,2,1];
sort($arr);              // Ordena de menor a mayor (modifica el original)
rsort($arr);             // Ordena de mayor a menor
shuffle($arr);           // Mezcla aleatoriamente
$count = count($arr);    // Número de elementos
$existe = in_array(2, $arr); // ¿Contiene el 2?
$pos = array_search(1, $arr); // Devuelve el índice donde está el 1
$ult = end($arr);        // Último elemento
$arr2 = ["a" => 2, "b"=>3];
$claves = array_keys($arr2);   // [ "a", "b" ]
$valores = array_values($arr2);// [ 2, 3 ]
unset($arr[0]); // Elimina elemento por índice/clave
array_push($arr, 10, 20); // Añade al final
array_pop($arr);          // Elimina último

</code></pre>
<div class="explicacion">
<b>VARIANTES:</b> Puedes agregar o modificar claves:
<code>$persona['ciudad'] = 'Madrid';</code><br>
Comprobar existencia:<code>array_key_exists('edad', $persona)</code>
</div>

<h2>6. Bucles</h2>
<div class="explicacion">
for: útil con arrays indexados<br>
while: repite mientras la condición sea verdadera<br>
foreach: recorrido natural para arrays en PHP
</div>
<pre><code>
&lt;?php
for($i=1;$i<=3;$i++) echo $i;
$j=1; while($j<=3) echo $j++;
foreach($colores as $c) echo $c;
?&gt;
</code></pre>

<h2>7. Funciones: estándar, tipadas, referencia, argumentos variables</h2>
<div class="explicacion">
Función básica, por referencia <code>&</code>, tipado <code>int</code> y argumentos variables (<code>...$args</code>)
</div>
<pre><code>
&lt;?php
function saludo($nombre,$veces=1){
  return str_repeat("Hola $nombre ",$veces);
}
echo saludo("Luis",2);

function inc(&$x){ $x++; }
$n=10; inc($n);

function sumaOpt(int $a, int $b=0):int{ return $a+$b; }

function sumarTodo(...$n){
  return array_sum($n);
}
echo sumarTodo(1,2,3,10);
?&gt;
</code></pre>

<h2>8. Formularios y entrada segura</h2>
<div class="explicacion">
Usa <code>htmlspecialchars</code> para mostrar datos del usuario y evitar XSS.<br>
Datos por GET se recuperan igual: <code>$_GET['nombre']</code>
</div>
<pre><code>
&lt;form method="post"&gt;
  &lt;input type="text" name="usuario"&gt;
  &lt;input type="submit"&gt;
&lt;/form&gt;
&lt;?php
if(isset($_POST['usuario'])){
  echo htmlspecialchars($_POST['usuario']);
}
?&gt;
</code></pre>

<h2>9. Cookies y sesiones</h2>
<div class="explicacion">
Las <b>cookies</b> se guardan en el navegador del usuario.<br>
Las <b>sesiones</b> sólo en servidor.</div>
<pre><code>
&lt;?php
session_start();
$_SESSION["usuario"]="Ana";
echo $_SESSION["usuario"];
setcookie("tema","oscuro",time()+3600,"/");
echo $_COOKIE["tema"] ?? "ninguno";
setcookie("tema","",time()-3600,"/");
?&gt;

setcookie("k", "v", time()+3600, "/"); // Crear cookie
$valor = $_COOKIE["k"] ?? "def";        // Leer (o valor por defecto)
setcookie("k", "", time()-3600, "/");   // Borrar

session_start();
$_SESSION["usuario"] = "Pepe";   // Crea/modifica
unset($_SESSION["usuario"]);      // Borra variable
session_destroy();                // Elimina sesión entera
session_regenerate_id(true);      // Cambia id, más seguro

</code></pre>
<div class="explicacion">
Opciones avanzadas al crear cookies:
<code>setcookie("user", "Ana", time()+3600, "/", "", true, true);</code><br>
Donde <code>true, true</code> es para <b>secure</b> y <b>httponly</b> respectivamente.
</div>

<h2>10. Archivos y permisos</h2>
<div class="explicacion">
Puedes crear, leer, añadir y comprobar permisos:
</div>
<pre><code>
&lt;?php
file_put_contents("datos.txt","Hola\n");
file_put_contents("datos.txt","Nueva\n", FILE_APPEND);
echo file_get_contents("datos.txt");
// Leer línea a línea
$fp=fopen("datos.txt","r");
while(($linea=fgets($fp))!==false) echo $linea; fclose($fp);
// Permisos: 
if(is_writable("datos.txt")) echo "Se puede escribir";
chmod("datos.txt",0644);
?&gt;
</code></pre>

<h2>11. Fechas y tiempo</h2>
<pre><code>
&lt;?php
echo date("d/m/Y H:i:s");
?&gt;

date("d/m/Y");           // "25/11/2025"
time();                  // Timestamp actual
strtotime("next Monday");// Timestamp de lunes próximo

</code></pre>

<h2>12. Errores y excepciones</h2>
<pre><code>
&lt;?php
try{
  throw new Exception("Error!");
}catch(Exception $e){
  echo $e->getMessage();
}
?&gt;

</code></pre>

<h2>13. JSON</h2>
<div class="explicacion">
Para convertir arrays en texto para usar en JavaScript o APIs y viceversa.
</div>
<pre><code>
&lt;?php
$arr=["a"=>7,"b"=>8];
$js=json_encode($arr);
$rec=json_decode($js,true);
if(json_last_error()!==JSON_ERROR_NONE) echo "Error JSON: ".json_last_error_msg();
?&gt;

$json = json_encode($array);                // Array a JSON
$array = json_decode($json, true);          // JSON a array
$error = json_last_error();                 // Código error
$msg = json_last_error_msg();               // Mensaje error

</code></pre>

<h2>14. Programación Orientada a Objetos (POO)</h2>
<pre><code>
&lt;?php
class Persona { public $nombre; function __construct($n){ $this->nombre=$n; } }
class Alumno extends Persona { public $curso="DAW"; }
$a=new Alumno("Luis"); echo $a->nombre." ".$a->curso;
?&gt;

class Persona {
    public $nombre;
    public function __construct($n) { $this->nombre = $n; }
    public function saluda() { return "Hola $this->nombre"; }
}

$p = new Persona("Luis");
echo $p->saluda();
// Chequear métodos y propiedades de un objeto
$metodos = get_class_methods($p);
$propiedades = get_object_vars($p);
$is = $p instanceof Persona;      // true


</code></pre>

<h2>15. Ejemplo de namespaces (no ejecutar en bloque, solo mostrar)</h2>
<div class="explicacion">
<b>IMPORTANTE:</b> Los <b>namespaces</b> deben ir en la PRIMERA línea del archivo de tus clases reales.
</div>
<pre><code>
&lt;?php
namespace MiApp\Models;
class Usuario {}
?&gt;
</code></pre>

<h2>16. Subida de ficheros</h2>
<pre><code>
&lt;form method="post" enctype="multipart/form-data"&gt;
  &lt;input type="file" name="fichero"&gt;
  &lt;input type="submit"&gt;
&lt;/form&gt;
&lt;?php
if(isset($_FILES["fichero"]) && $_FILES["fichero"]["error"]==0){
  move_uploaded_file($_FILES["fichero"]["tmp_name"],"uploads/".$_FILES["fichero"]["name"]);
  echo "Archivo subido!";
}
?&gt;

file_put_contents("archivo.txt", "texto");         // Escribe entero
file_get_contents("archivo.txt");                  // Lee todo
file_exists("carpeta/archivo.txt");                // ¿Existe?
unlink("archivo.txt");                             // Borra
$lineas = file("archivo.txt");                     // Array de líneas
$isWrite = is_writable("archivo.txt");             // ¿Permite escribir?
chmod("archivo.txt", 0644);                        // Cambia permisos (depende sistema)

</code></pre>

<h2>17. Envío de emails</h2>
<pre><code>
&lt;?php
// mail("destino@algo.com","Asunto","Cuerpo","From: tu@correo.com");
?&gt;
</code></pre>

<h2>18. Conexión a BBDD (MySQLi y PDO)</h2>
<ol>
<li>
<b>MySQLi Mejorado:</b> Optimiza usando <code>prepare</code> y <code>bind_param</code> para seguridad:
<pre><code>
&lt;?php
$conn = mysqli_connect("localhost","usuario","clave","bd");
// Consulta segura
$stmt = $conn->prepare("SELECT * FROM alumnos WHERE id = ?");
$stmt->bind_param("i", $id);
$id = 1; $stmt->execute();
$res = $stmt->get_result();
while($fila = $res->fetch_assoc()) echo $fila["nombre"];
$stmt->close(); $conn->close();
?&gt;
</code></pre>
</li>
<li>
<b>PDO (mucho más flexible y profesional):</b>
<pre><code>
&lt;?php
try{
  $pdo=new PDO("mysql:host=localhost;dbname=bd","usuario","clave");
  $st = $pdo->prepare("SELECT * FROM alumnos WHERE id=:id");
  $st->execute(['id'=>1]);
  $fila=$st->fetch();
  echo $fila["nombre"];
}catch(PDOException $e){ echo $e->getMessage();}
?&gt;
</code></pre>
</li>
<li>
<b>Antigua (NO USAR):</b>
<pre><code>
&lt;?php
$conn=@mysql_connect("localhost","usuario","clave");
mysql_select_db("bd",$conn);
$res=mysql_query("SELECT * FROM tabla",$conn);
while($f=mysql_fetch_assoc($res)) echo $f["col"];
mysql_close($conn);
?&gt;
</code></pre>
<div class="explicacion">
Las funciones <b>mysql_*</b> están DEPRECADAS y NO recomendadas desde PHP 7.
</div>
</li>
</ol>
 <h2>PHP: Métodos y funciones para BBDD MySQL (MySQLi y PDO)</h2> <section> <h3>1. MySQLi Orientado a Objetos</h3> <div class="explicacion"> <b>Métodos clave:</b> <ul> <li><code>__construct(string $host, string $user, string $pass, string $db)</code>: Conecta</li> <li><code>prepare(string $sql)</code>: Prepara consulta (con ? para parámetros)</li> <li><code>bind_param(string $tipos, ...$var)</code>: Enlaza valores a ?</li> <li><code>execute()</code>: Ejecuta la consulta</li> <li><code>get_result()</code>: Obtiene resultado (solo si usas mysqlnd)</li> <li><code>fetch_assoc()</code>: Devuelve fila como array asociativo</li> <li><code>close()</code>: Cierra la conexión o stmt</li> </ul> </div> <pre><code> &lt;?php // Conexión $mysqli = new mysqli("localhost", "root", "", "company_info"); $mysqli->set_charset("utf8mb4");
// SELECT preparado
$stmt = $mysqli->prepare("SELECT id, nombre FROM usuarios WHERE nombre LIKE ?");
$busqueda = "%an%";
$stmt->bind_param("s", $busqueda);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
echo $row["id"] . "|" . $row["nombre"] . "<br>";
}
$stmt->close();

// INSERT preparado
$stmt = $mysqli->prepare("INSERT INTO usuarios(nombre, correo) VALUES (?, ?)");
$stmt->bind_param("ss", $nombre, $correo);
$nombre = "Luis";
$correo = "luis@email.com";
$stmt->execute();
$stmt->close();

// UPDATE preparado
$stmt = $mysqli->prepare("UPDATE usuarios SET nombre = ? WHERE id = ?");
$stmt->bind_param("si", $nuevo_nombre, $id);
$nuevo_nombre = "Maria";
$id = 2;
$stmt->execute();
$stmt->close();

// DELETE preparado
$stmt = $mysqli->prepare("DELETE FROM usuarios WHERE nombre = ?");
$stmt->bind_param("s", $nombre_borrar);
$nombre_borrar = "Luis";
$stmt->execute();
$stmt->close();

$mysqli->close();
?>
</code></pre>
<div class="explicacion">
<b>Tipos en <code>bind_param()</code>: </b>
<ul>
<li><b>s</b> = string</li>
<li><b>i</b> = integer</li>
<li><b>d</b> = double</li>
<li><b>b</b> = blob</li>
</ul>
</div>

</section> <hr> <section> <h3>2. MySQLi Procedimental</h3> <div class="explicacion"> <b>Funciones equivalentes:</b> <ul> <li><code>mysqli_connect($host, $user, $pass, $db)</code></li> <li><code>mysqli_prepare($conn, $sql)</code></li> <li><code>mysqli_stmt_bind_param($stmt, $tipos, ...$vars)</code></li> <li><code>mysqli_stmt_execute($stmt)</code></li> <li><code>mysqli_stmt_get_result($stmt)</code></li> <li><code>mysqli_fetch_assoc($result)</code></li> <li><code>mysqli_close($conn)</code>, <code>mysqli_stmt_close($stmt)</code></li> </ul> </div> <pre><code> &lt;?php $conn = mysqli_connect("localhost", "root", "", "company_info");
// SELECT preparado
$stmt = mysqli_prepare($conn, "SELECT id, nombre FROM usuarios WHERE nombre LIKE ?");
$busqueda = "%an%";
mysqli_stmt_bind_param($stmt, "s", $busqueda);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
while ($row = mysqli_fetch_assoc($result)) {
echo $row["id"] . "|" . $row["nombre"] . "<br>";
}
mysqli_stmt_close($stmt);

// INSERT preparado
$stmt = mysqli_prepare($conn, "INSERT INTO usuarios(nombre, correo) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt, "ss", $nombre, $correo);
$nombre = "Pedro";
$correo = "pedro@email.com";
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

mysqli_close($conn);
?>
</code></pre>

</section> <hr> <section> <h3>3. PDO (PHP Data Objects)</h3> <div class="explicacion"> <b>Métodos clave:</b> <ul> <li><code>new PDO($dsn, $user, $pass)</code>: Crea conexión</li> <li><code>setAttribute()</code>: Opciones extra (ejemplo, errores por excepción)</li> <li><code>prepare($sql)</code>: Prepara consulta con <code>?</code> o <code>:nombre</code> como parámetros</li> <li><code>bindParam()</code>: Enlaza variables (menos usado)</li> <li><code>execute(array)</code>: Ejecuta pasando los valores</li> <li><code>fetch()</code> / <code>fetchAll()</code>: Recupera una/all filas</li> <li><code>lastInsertId()</code>: Última id generada</li> <li><code>beginTransaction() / commit() / rollBack()</code>: Transacciones</li> </ul> </div> <pre><code> &lt;?php // Conexión y configuración (recomendado: errores como excepción) $pdo = new PDO("mysql:host=localhost;dbname=company_info", "root", ""); $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// SELECT preparado posicional
$stmt = $pdo->prepare("SELECT id, nombre FROM usuarios WHERE nombre LIKE ?");
$search = "%an%";
$stmt->execute([$search]);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
echo $row["id"] . "|" . $row["nombre"] . "<br>";
}

// SELECT con marcadores nombrados
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nombre = :nombre");
$stmt->execute(['nombre' => "Luis"]);
$data = $stmt->fetch();

// INSERT preparado
$stmt = $pdo->prepare("INSERT INTO usuarios (nombre, correo) VALUES (?, ?)");
$stmt->execute(["Pablo", "pablo@email.com"]);

// UPDATE
$stmt = $pdo->prepare("UPDATE usuarios SET correo = ? WHERE nombre = ?");
$stmt->execute(["nuevo@email.com", "Luis"]);

// DELETE
$stmt = $pdo->prepare("DELETE FROM usuarios WHERE nombre = ?");
$stmt->execute(["Pedro"]);

$ultimoId = $pdo->lastInsertId();
?>
</code></pre>
<div class="explicacion">
<b>¿Cómo elegir?</b>
<ul>
<li>Usa <code>prepare</code> y <code>execute</code> SIEMPRE para datos del usuario: más seguro y protegido contra inyección SQL.</li>
<li>PDO es más portable (funciona con MySQL, SQLite, PostgreSQL, etc).</li>
<li>MySQLi es específico para MySQL, pero muy eficiente y moderno.</li>
</ul>
</div>

</section>
<h2>19. Seguridad y buenas prácticas</h2>
<div class="explicacion">
<ol>
<li>Siempre <b>escapa</b> la entrada del usuario al mostrarla: <b>htmlspecialchars()</b></li>
<li>Las consultas SQL, siempre preparadas (<code>prepare + execute</code>)</li>
<li>No guardes contraseñas en texto plano. Usa <code>password_hash</code> y <code>password_verify</code></li>
<li>Validación (lenguaje y tipo) de todos los datos antes de procesarlos</li>
<li>No muestres errores de sistema al usuario final</li>

</ol>
</div>
<pre><code>
  $limpio = htmlspecialchars($input);  // Evita XSS al mostrar en HTML
$valido = filter_var($email, FILTER_VALIDATE_EMAIL);
if ($valido===false) { /* no es email */ }
$is_num = is_numeric($dato);

</code></pre>


<h2>20. PHP 8+: Attributes (solo ejemplo, no ejecutar en bloque normal)</h2>
<div class="explicacion">
<b>Atributos:</b> Permiten anotar clases, métodos, funciones, parámetros (usados en frameworks modernos).
</div>
<pre><code>
&lt;?php
#[Attribute]
class Ruta {
  public function __construct(public string $path, public array $methods=["GET"]){}
}
#[Ruta("/home",["GET","POST"])]
class HomeCtrl {}
$refl = new ReflectionClass(HomeCtrl::class);
foreach($refl->getAttributes() as $a){
  var_dump($a->getName());
  var_dump($a->getArguments());
}
?&gt;
</code></pre>

<h2>21. Utilidades rápidas</h2>
<pre><code>
&lt;?php
echo count([1,2,3]);
echo implode(":",["a","b","c"]);
echo strtoupper("abc");
?&gt;
</code></pre>

</body>
</html>
