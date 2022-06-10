<?php 
ini_set('display_errors',1);
ini_set('display_startup_errors',1); 
error_reporting(E_ALL);

session_start();

$aPersonas = array();
$aPersonas[] = array("nombre"=>"Nelson",
                "dni" => 33300012,
                "telefono" => "15627123",
                "edad" => 34);

$aPersonas[] = array("nombre"=>"Ana Valle",
                "dni" => 16480375,
                "telefono" => "15627323",
                "edad" => 42);

$_SESSION ["listadoDePersonas"] = $aPersonas;

//session_destroy();

print_r($_SESSION);

echo "El nombre de la persona 1 es: " . $_SESSION["listadoDePersonas"][0]["nombre"];
?>

