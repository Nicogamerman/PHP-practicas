<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$aPacientes = array();

$aPacientes[]= array(
    "dni"=> "33.765.012",
    "nombre"=> "Ana Acuña",
    "edad" => 45,
    "peso" => 81.5

);

$aPacientes[]= array(
    "dni"=> "23.684.385",
    "nombre"=> "Gonzalo Bustamante",
    "edad" => 66,
    "peso" => 69
);

$aPacientes[]= array(
    "dni"=> "23.684.385",
    "nombre"=> "Juan Irraola",
    "edad" => 28,
    "peso" => 79
);

$aPacientes[]= array(
    "dni"=> "23.684.385",
    "nombre"=> "Beatriz Ocampo",
    "edad" => 50,
    "peso" => 79
);
 
function contar($aArray){
    $cont=0;
    foreach($aArray as $item);
    $cont= $cont + 1;

}
   return $cont;
   echo "Cantidad de Pacientes" .contar ($aPacientes) . "<br>"
   
   ?>
