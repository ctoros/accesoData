<?php

    include_once("../model/objeto.php");

    $objeto = new Objeto();
    $objeto->setDescripcion($_POST["objeto"]);
    $objeto->setNserie($_POST["nserie"]);
    $objeto->setModelo($_POST["modelo"]);
    $objeto->setRutpersona($_POST["rut"]);
    $resp2 = $objeto->save();

//        $objeto = new Objeto();
//    $objeto->setDescripcion("adfaf");
//    $objeto->setNserie("dasf");
//    $objeto->setModelo("modelo");
//    $objeto->setRutpersona("rut");
//    $resp2 = $objeto->save();

    if ($resp2[0]) {
        http_response_code(200);
    } else {
        http_response_code(400);
    }
    echo $resp2[1];
    ?>
