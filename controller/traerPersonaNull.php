<?php

include_once("../model/persona.php");



$method = $_SERVER['REQUEST_METHOD'];
    $rutPersona = "";
    $persona = new Persona();
    
    $rutPersona = $_POST["rut"];
    $persona = $persona->getPersonByRut($rutPersona);

header('Content-Type: application/json');
echo json_encode($persona);

?>
