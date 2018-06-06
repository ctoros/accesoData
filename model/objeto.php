<?php

include_once("../service/connect.php");

class Objeto {

    public $id = "";
    public $descripcion = "";
    public $nserie = "";
    public $modelo = "";
    public $rutpersona = "";
    public $fechaingreso = "";
    function getFechaingreso() {
        return $this->fechaingreso;
    }

    function setFechaingreso($fechaingreso) {
        $this->fechaingreso = $fechaingreso;
    }

        function getId() {
        return $this->id;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getNserie() {
        return $this->nserie;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getRutpersona() {
        return $this->rutpersona;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setNserie($nserie) {
        $this->nserie = $nserie;
    }

    function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    function setRutpersona($rutpersona) {
        $this->rutpersona = $rutpersona;
    }

    function save() {
        $db = new DataBase();
        $conn = $db->connect();
        if ($conn) {
            $sql = "INSERT INTO objetos (descripcion,nserie,modelo,rutpersona) VALUES ('" . $this->descripcion . "','" . $this->nserie . "','" . $this->modelo . "','" . $this->rutpersona . "')";
            if ($conn->query($sql) === TRUE) {
                return array(TRUE, $this->toJSON());
            } else {
                return array(FALSE, $conn->error);
            }
        }
    }

    function listEmpresa() {
        $filas = [];
        $db = new DataBase();
        $conn = $db->connect();
        if ($conn) {
            $sql = "SELECT * FROM empresa order by descripcionempresa";
            if ($conn->query($sql)) {
                $rs = $conn->query($sql);
                while ($fila = mysqli_fetch_assoc($rs)) {
                    array_push($filas, $fila);
                }
                return $filas;
            }
        }
    }

    function delete($id) {
        $db = new DataBase();
        $conn = $db->connect();
        if ($conn) {
            $sql = "delete from empresa where id= $id";
            if ($conn->query($sql) === TRUE) {
                return array(TRUE, $this->toJSON());
            } else {
                return array(FALSE, $conn->error);
            }
        }
    }

    function toJSON() {
        $arr = array(
            'id' => $this->id,
            'descripcion' => $this->descripcion,
            'nserie' => $this->nserie,
            'modelo' => $this->modelo,
            'rutpersona' => $this->rutpersona,
            'fechaingreso' => $this->fechaingreso
        );
        return json_encode($arr);
    }

}

?>
