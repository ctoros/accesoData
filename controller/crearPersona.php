<?php

include_once("../model/persona.php");
//  include_once("../model/objeto.php");

$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {
    $persona = new Persona();
    $persona->setRut($_POST["rut"]);
    $persona->setNombre($_POST["nombre"]);
    $persona->setApellido($_POST["apellido"]);
    $persona->setEmpresa($_POST["empresa"]);
    $persona->setClienteatrabajar($_POST["clienteatrabajar"]);
    $persona->setActividad($_POST["actividad"]);
    $resp = $persona->save();
//        $objeto = new Objeto();
//    $objeto->setDescripcion($_POST["objeto"]);
//    $objeto->setNserie($_POST["nserie"]);
//    $objeto->setModelo($_POST["modelo"]);
//    $objeto->setRutpersona($_POST["rut"]);
//    $resp2 = $objeto->save();
    if ($resp[0]) {
        http_response_code(200);
    } else {
        http_response_code(400);
    }
  


//    if ($resp2[0]) {
//        http_response_code(200);
//    } else {
//        http_response_code(400);
//    }
    echo $resp[1];
}
?>
