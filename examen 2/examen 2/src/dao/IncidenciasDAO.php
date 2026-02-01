<?php
require_once "./../db/connection.php";
require_once "./../model/Incidencias.php";

class IncidenciaDAO
{

    public function getIncidencias()
    {
        // return ["usuario"=>$usuario];
        $conn = DataBase::getConnection();
        $stmt = $conn->prepare("select * from incidencias");
        $stmt->execute();
        $lista = [];
        while ($incidencias = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lista[] = new Incidencias($incidencias['id'], $incidencias['titulo'], $incidencias['descripcion'], $incidencias['estado'], $incidencias['usuario_id']);
        }
        $result = [];

        foreach ($lista as $incidencia) {
            $result[] = ["id" => $incidencia->getId(), "titulo" => $incidencia->titulo, "descripcion" => $incidencia->descripcion, "estado" => $incidencia->estado, "usuarioId" => $incidencia->getusUarioId()];
        }
        return $result;

    }
    public function getIncidencia($id)
    {
        // return ["usuario"=>$usuario];
        $conn = DataBase::getConnection();
        $stmt = $conn->prepare("select * from incidencias where id = :id");
        $stmt->execute();
        $incidencias = $stmt->fetch(PDO::FETCH_ASSOC);

        return new Incidencias($incidencias['id'], $incidencias['titulo'], $incidencias['descripcion'], $incidencias['estado'], $incidencias['usuario_id']);



    }
    public function cargarIncidencias()
    {
        $getIncidencias = $this->getIncidencias();
        return $getIncidencias;
    }

    public function cambiarEstado($id)
    {
        $conn = DataBase::getConnection();
        $stmt = $conn->prepare("update incidencias set estado='resuelta' where id = :id");
        if ($stmt->execute([":id" => $id])) {
            return ["cambio" => true, "message" => "la incidencia se cambio a resuelta"];

        }
        return ["cambio" => false, "message" => "la incidencia no se cambio a resuelta"];
    }
    public function eliminarIncidencia($id, $usuarioId, $id_actual)
    {

        // return ["id"=>$id,"usu"=>$usuarioId,'id_ac'=>$id_actual];

        if ($usuarioId == $id_actual) {
            $conn = DataBase::getConnection();
            $stmt = $conn->prepare("delete from incidencias where id = :id");
            if ($stmt->execute([":id" => $id])) {
                return ["eliminacion" => true, "message" => "la incidencia se a eliminado"];

            }
            return ["eliminacion" => false, "message" => "la incidencia no se a eliminado"];


        }
        return ["eliminacion" => false, "message" => "no puedes eliminar la incidencia, no te pertenece"];

    }

    public function crearIncidencia($titulo, $descripcion, $estado, $usuario_id)
    {

        $conn = DataBase::getConnection();
        $stmt = $conn->prepare("INSERT INTO incidencias(titulo,descripcion,estado,usuario_id) VALUES (:t,:d,:e,:u)");
        if (
            $stmt->execute([
                ":t" => $titulo,
                ":d" => $descripcion,
                ":e" => $estado,
                ":u" => $usuario_id
            ])
        ) {
            return ["creado" => true, "message" => "la incidencia se a creado"];

        }
        return ["creado" => false, "message" => "la incidencia no se a creado"];
    }
}