<?php

include("../service/connect.php");

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

    function save() {
        $db = new DataBase();
        $conn = $db->connect();
        if ($conn) {
            $sql = "INSERT INTO persona ( rut, nombre, apellido, empresa, clienteatrabajar, actividad)"
                    . " VALUES ('" . $this->rut . "', '" . $this->nombre . "', '" . $this->apellido . "', "
                    . "'" . $this->empresa . "', '" . $this->clienteatrabajar . "', '" . $this->actividad . "')";
            if ($conn->query($sql) === TRUE) {
                return array(TRUE, $this->toArray());
            } else {
                return array(FALSE, $conn->error);
            }
        }
    }

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

    function getUserById($idPersona) {
        $personas = [];
        $db = new DataBase();
        $conn = $db->connect();
        if ($conn) {
            $sql = "SELECT * FROM persona WHERE id ='" . $idPersona . "' ";
            echo $idPersona;
            if ($conn->query($sql)) {
                $resp = $conn->query($sql);
                while ($fila = mysqli_fetch_assoc($resp)) {
                    $persona = new Persona();
                    $persona->setId($fila['id']);
                    $persona->setNombre($fila['rut']);
                    $persona->setValor($fila['nombre']);
                    $persona->setValor($fila['apellido']);
                    $persona->setValor($fila['fechahoraingreso']);
                    $persona->setValor($fila['horasalida']);
                    $persona->setValor($fila['empresa']);
                    $persona->setValor($fila['clienteatrabajar']);
                    $persona->setValor($fila['actividad']);
                    array_push($personas, $persona);
                }
                return $personas;
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