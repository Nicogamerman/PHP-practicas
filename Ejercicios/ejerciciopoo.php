<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class  Persona{
    public $nombre; //esta es una propiedad de la clase
    public function asignarNombre($nuevoNombre){ //esta es una accion o metodo propia de la clase.
        $this-> nombre = $nuevoNombre; // $this is mainly used to refer properties of a class. //! $this -> nombre referencia a la propiedad $nombre y la reemplaza por $nuevoNombre
    }
    public function imprimirNombre(){ //otro metodo de la clase persona.
        echo "Hola soy " . $this -> nombre . "</br>";
    }
}

$objAlumno = new Persona();
$objAlumno -> asignarNombre("Oscar");
$objAlumno -> imprimirNombre();

$objAlumno2 = new Persona();
$objAlumno2 -> asignarNombre("Juan");
$objAlumno2 -> imprimirNombre();


?>