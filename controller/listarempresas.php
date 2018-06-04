<?php

include("../model/empresa.php");

$empresa = new Empresa();
$empresas = Array();
$arrayProduct = Array();
$empresas = $empresa->listEmpresa();
//$resp = [];
//foreach($productss as $p) {
//	$arrayProduct = $p->toArray();
//	array_push($resp, $arrayProduct);
//}

header('Content-Type: application/json');
//echo json_encode($resp);
echo json_encode($empresas);
?>
