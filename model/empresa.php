<?php

include_once("../service/connect.php");

class Empresa {

    public $id = "";
    public $descripcionEmpresa = "";

    function setId($id) {
        $this->id = $id;
    }

    function setDescripcionEmpresa($descripcionEmpresa) {
        $this->descripcionEmpresa = $descripcionEmpresa;
    }

        function save() {
        $db = new DataBase();
        $conn = $db->connect();
        if ($conn) {
            $sql = "INSERT INTO empresa (descripcionEmpresa) VALUES ('" . $this->descripcionEmpresa . "')";
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
            'descripcionEmpresa' => $this->descripcionEmpresa,
        );
        return json_encode($arr);
    }

}

?>
