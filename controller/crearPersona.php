<?php

include("../model/persona.php");

$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {
    $persona = new Persona();
    $persona->rut($_POST["rut"]);
    $persona->nombre($_POST["nombre"]);
    $persona->apellido($_POST["apellido"]);
    $persona->empresa($_POST["empresa"]);
    $persona->clienteatrabajar($_POST["clienteatrabajar"]);
    $persona->actividad($_POST["actividad"]);
    $resp = $persona->save();
    if ($resp[0]) {
        http_response_code(200);
    } else {
        http_response_code(400);
    }
    echo $resp[1];
}
?>
