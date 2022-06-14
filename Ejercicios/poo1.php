<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona{
    public $dni;
    public $nombre;
    public $edad;
    public $nacionalidad;

    public function imprimir(){

    }
}

class Alumno extends Persona { //va a tener las propiedades y metodos de la definicion de persona.
    public $legajo;
    public $notaPortfolio;
    public $notaPhp;
    public $notaProyecto;

    public function __construct(){
        $this -> notaPortfolio= 0.0;
        $this -> notaPhp= 0.0;
        $this -> notaProyecto= 0.0;

        public function imprimir(){

        }

        public function calcularPromedio(){

        }
    }
}

class Docente extends Persona{
    public $especialidad;

    public function imprimir(){

    }

    public function imprimirEspecialidadeshabilitadas(){

    }

}

//Programa
$alumno1 = new Alumno ();
$alumno1-> nombre = "Juana Mendoza";
$alumno1-> dni = "35345123";
$alumno1-> edad = 32;
$alumno1-> nacionalidad = "Argentina";
$alumno1-> notaPhp = 8;
$alumno1-> notaPortfolio = 9;
$alumno1-> notaProyecto = 10;
$alumno1-> imprimir ();

$alumno1 = new Alumno ();
$alumno1-> nombre = "Ana Perez";
$alumno1-> dni = "40123658";
$alumno1-> edad = 25;
$alumno1-> nacionalidad = "Argentina";
$alumno1-> notaPhp = 9;
$alumno1-> notaPortfolio = 8;
$alumno1-> notaProyecto = 9;
$alumno1-> imprimir ();


//MINUTO 24

?>