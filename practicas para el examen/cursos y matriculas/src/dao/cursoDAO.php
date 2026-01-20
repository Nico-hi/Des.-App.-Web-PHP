<?php
require_once "./../db/connection.php";
require_once "./../dao/cursoDAO.php";
require_once "./../model/curso.php";
class CursoDAO
{
    public static function getCursos()
    {
        $conn = DataBase::getConnection();
        $stmt = $conn->prepare("select * from cursos where 1");
        $stmt->execute();
        $cursos = [];
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cursos[] = new Curso($result['id'], $result['curso'], $result['descripcion']);
        }
        /* 
         esto es posible pero se tendria que sacar en otra variable realizando un bucle 
         por cada elemento , el cual tendria la sentencia de abajo, y luego exportar lo mismo
         pero como en el model ya definimos que es privado y que no , nos da igual porque es 
         lo mismo que las variables publicas lo que sacaremos con este metodo, pero como necesitamos el id hay de dos
         hacer el bucle o ponerlo en el model como publico
         echo json_encode(["curso" => $result['curso'], "descripcion" => $result['descripcion']]); */
        $lista = [];
        foreach ($cursos as $curso) {
            $lista[] = ["id" => $curso->getId(), "curso" => $curso->curso, "descripcion" => $curso->descripcion];
        }

        return $lista;
    }
    public static function cargarmatriculas($usuario)
    {
        $conn = DataBase::getConnection();
        $stmt = $conn->prepare("select * from cursos c where c.id in (select m.curso_id from matriculas m where m.usuario_id = :u)");
        $stmt->execute([
            ":u" => $usuario
        ]);
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cursos[] = new Curso($result['id'], $result['curso'], $result['descripcion']);
        }
        // return $cursos;
        $lista = [];
        if(!isset($cursos)) {
            return ["message"=>"no tienes cursos"];
        }
        if(count($cursos) < 2) {
            return ["id" => $cursos[0]->getId(), "curso" => $cursos[0]->curso, "descripcion" => $cursos[0]->descripcion];
        }
        foreach ($cursos as $curso) {
            $lista[] = ["id" => $curso->getId(), "curso" => $curso->curso, "descripcion" => $curso->descripcion];
        }
        return $lista;
    }
    public static function matricular($usuario, $curso)
    {
        try {
            $conn = DataBase::getConnection();
            $stmt = $conn->prepare("insert into matriculas(usuario_id, curso_id) values (:u,:c)");
            $result = $stmt->execute([
                ":u" => $usuario,
                ":c" => $curso
            ]);
            if ($result) {
                return ["funciono" => true, "message" => "la matricula se hizo correctamente"];
            }
            return ["funciono" => false, "message" => "la matricula no se hizo correctamente"];
        } catch (PDOException $e) {
            if ($e->getCode() == "23000") {
                return ["funciono" => false, "message" => "la matricula ya fue realizada"];
            }
        }

    }
    public static function desmatricular($usuario, $curso)
    {
        try {
        } catch (PDOException $e) {
        }
        $conn = DataBase::getConnection();
        $stmt = $conn->prepare("delete from matriculas where usuario_id = :u and curso_id = :c ");
        $result = $stmt->execute([
            ":u" => $usuario,
            ":c" => $curso
        ]);

        if ($result) {
            return ["funciono" => true, "message" => "la matricula se hizo quito correctamente"];
        }
        return ["funciono" => false, "message" => "la matricula no se hizo quito correctamente"];

    }

    public static function eliminar($usuario){
    $conn = Database::getConnection();
    $stmt = $conn->prepare("delete from matriculas where usuario_id = :u ");
    $result = $stmt->execute([
        ":u"=> $usuario
    ]);
    if ($result) {
        return ["delete"=> true, "message"=> "le elimino la matricula"];
        }
        return ["delete"=> false, "message"=> "no se pudo eliminar la matricula"];
    }
}