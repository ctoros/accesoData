<?php

include_once("../service/connect.php");

class Persona {

    public $id = "";
    public $rut = "";
    public $nombre = "";
    public $apellido = "";
    public $fechahoraingreso = "";
    public $horasalida = "";
    public $empresa = "";
    public $clienteatrabajar = "";
    public $actividad = "";

    function setId($id) {
        $this->id = $id;
    }

    function setRut($rut) {
        $this->rut = $rut;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setFechahoraingreso($fechahoraingreso) {
        $this->fechahoraingreso = $fechahoraingreso;
    }

    function setHorasalida($horasalida) {
        $this->horasalida = $horasalida;
    }

    function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    function setClienteatrabajar($clienteatrabajar) {
        $this->clienteatrabajar = $clienteatrabajar;
    }

    function setActividad($actividad) {
        $this->actividad = $actividad;
    }
    function getId() {
        return $this->id;
    }

    function getRut() {
        return $this->rut;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getFechahoraingreso() {
        return $this->fechahoraingreso;
    }

    function getHorasalida() {
        return $this->horasalida;
    }

    function getEmpresa() {
        return $this->empresa;
    }

    function getClienteatrabajar() {
        return $this->clienteatrabajar;
    }

    function getActividad() {
        return $this->actividad;
    }

        function save() {
        $db = new DataBase();
        $conn = $db->connect();
        if ($conn) {
            $sql = "INSERT INTO persona (rut, nombre, apellido, empresa, clienteatrabajar, actividad)"
                    . " VALUES ('" . $this->rut . "', '" . $this->nombre . "', '" . $this->apellido . "', "
                    . "'" . $this->empresa . "', '" . $this->clienteatrabajar . "', '" . $this->actividad . "')";
            if ($conn->query($sql) === TRUE) {
                return array(TRUE, $this->toArray());
            } else {
                return array(FALSE, $conn->error);
            }
        }
    }
//    SELECT * FROM `persona` WHERE `horasalida` IS NULL
//    function listUsers() {
//        $users = [];
//        $db = new DataBase();
//        $conn = $db->connect();
//        if ($conn) {
//            $sql = "SELECT * FROM user";
//            if ($conn->query($sql)) {
//                $resp = $conn->query($sql);
//                while ($fila = mysqli_fetch_assoc($resp)) {
//                    $usr = new User();
//                    $usr->setId($fila['id']);
//                    $usr->setEmail($fila['email']);
//                    $usr->setPassword($fila['password']);
//                                        $usr->setPassword($fila['password']);
//
//                    array_push($users, $usr);
//                }
//                return $users;
//            }
//            echo "entra y no trae";
//        }
//        echo "no entra";
//    }

    function getPersonByRut($rutPersona) {
        $personas = [];
        $db = new DataBase();
        $conn = $db->connect();
        if ($conn) {
//            $sql = "SELECT * FROM persona WHERE id ='" . $idPersona . "' ";
            $sql = "SELECT * FROM persona WHERE rut LIKE '".$rutPersona."' AND fechasalida IS NULL";
//            echo $idPersona;
            if ($conn->query($sql)) {
                $resp = $conn->query($sql);
                $fila = mysqli_fetch_assoc($resp);
                $p = new Persona();
                $p->setActividad($fila['actividad']);
                $p->setId($fila['id']);
//                echo "aqi fila:", $fila;
                $sql = "UPDATE persona SET actividad = '".$p->getActividad()."agregar"."' WHERE id = '".$p->getId()."' ";
                if ($conn->query($sql)) {
                    
//                    echo "aqui actividad: ",$p->getActividad();
//                    echo "  aqui id:  ",$p->getId(),"   finid  ";
                    return $fila;
                }
//                UPDATE `persona` SET `actividad` = 'revisi on' WHERE `id` = 1043;
                
            }
        }
    }

    public function deleteById($nId) {
        $db = new Database();
        $conn = $db->connect();
        if ($conn) {
            $query = "Delete persona where id=$this->$nId";
            echo $query;
            if ($conn->query($query) === true) {
                return array(TRUE, $this->toArray());
            } else {
                return array(FALSE, $conn->error);
            }
        }
    }

//    public function updateByID($id, $email, $pass) {
//        $db = new Database();
//        $conn = $db->connect();
//        if ($conn) {
//            $query = "UPDATE user SET email='" . $email . "',"
//                    . "SET codigo='" . $pass . "',"
//                    . "WHERE id=$id";
//            echo $query;
//            if ($conn->query($query) === true) {
//                return array(TRUE, $this->toArray());
//            } else {
//                return array(FALSE, $conn->error);
//            }
//        }
//    }

    function toArray() {
        $arr = array(
        'id' => $this->id,
        'rut' => $this->rut,
        'nombre' => $this->nombre,
        'apellido' => $this->apellido,
        'fechahoraingreso' => $this->fechahoraingreso,
        'horasalida' => $this->horasalida,
        'empresa' => $this->empresa,
        'clienteatrabajar' => $this->clienteatrabajar,
        'actividad' => $this->actividad
        );
        return json_encode($arr);
    }

}

?>