<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona{
    protected $dni; //las clases padres siempre deben ser protected, no private ya que en ese caso no podriamos acceder desde clases hijas.
    protected $nombre;
    protected $edad;
    protected $nacionalidad;

    public function setNombre($nombre){ //esta es la forma "tediosa" de colocar getters y setters, php nos da una forma mas simple, que es la que usamos mas abajo en alumnos y docente.
        $this-> nombre = $nombre;
    }
    public function getNombre(){
         return $this-> nombre;
    }

    public function setDni($dni){
        $this -> dni = $dni;
    }
    public function getDni(){
        return $this -> dni;
    }

    public function setEdad($edad){
        $this -> edad = $edad;
    }
    public function getEdad(){
       return $this -> edad;
    }

    public function setNacionalidad($nacionalidad){
        $this -> nacionalidad = $nacionalidad;
    }
    public function getNacionalidad(){
       return $this -> nacionalidad;
    }

    public function imprimir(){
    }

    public function __destruct() {
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }    
}

class Alumno extends Persona { //va a tener las propiedades y metodos de la definicion de persona.
    private $legajo;
    private $notaPortfolio;
    private $notaPhp;
    private $notaProyecto;

    public function __get($propiedad){ //esta es la forma mas simple de acortar todos los getter y setter, esto nos lo facilita php.
        return $this -> $propiedad;
    }

    public function __set($propiedad, $valor){ //forma simple de colocar el setter.
        $this -> $propiedad = $valor;
    }

    public function __construct($dni="", $nombre=""){ // a traves de las funciones es la unica forma de interactuar con el objeto desde el programa.
        $this -> dni = $dni;
        $this -> nombre = $nombre;
        $this -> notaPortfolio = 0.0;
        $this -> notaPhp = 0.0;
        $this -> notaProyecto = 0.0;
    }

    public function __destruct() {
        echo "Destruyendo el objeto " . $this->nombre . "<br><br>";
    }   
    
    public function imprimir(){
        echo "Alumno: " . $this -> nombre . "<br>";
        echo "Dni: " . $this -> dni . "<br>";
        echo "Nota Php: " . $this -> notaPhp . "<br>";
        echo "Nota Portfolio: " . $this -> notaPortfolio . "<br>";
        echo "Nota Proyecto: " . $this -> notaProyecto . "<br><br>";       

    }

    public function calcularPromedio(){
    }     
}

class Docente extends Persona{
    private $especialidad;

    const ESPECIALIDAD_ECO = "Economia aplicada";
    const ESPECIALIDAD_WP = "Wordpress";
    const ESPECIALIDAD_BBDD = "Base de datos";
    
    public function imprimir(){
        echo "Docente: " . $this -> nombre . "<br>";
        echo "Especialidad: " . $this -> especialidad. "<br>";

    }

    public function __get($propiedad){ //esta es la forma mas simple de acortar todos los getter y setter, esto nos lo facilita php.
        return $this -> $propiedad;
    }

    public function __set($propiedad, $valor){ //forma simple de colocar el setter.
        $this -> $propiedad = $valor;
    }

    public function imprimirEspecialidadeshabilitadas(){
        echo self:: ESPECIALIDAD_WP. "<br>";
        echo self:: ESPECIALIDAD_BBDD. "<br>";
        echo self:: ESPECIALIDAD_ECO. "<br><br>";

    }

    public function __destruct(){
        echo "Destruyendo el objeto " . $this -> nombre . "<br><br>";
    }
    
}

//Programa
$alumno1 = new Alumno ("35345123" , "Juana Mendoza");
$alumno1-> nombre = "Juana Mendoza";
$alumno1-> dni = "35345123";
$alumno1-> edad = 32;
$alumno1-> nacionalidad = "Argentina";
$alumno1-> notaPhp = 8;
$alumno1-> notaPortfolio = 9;
$alumno1-> notaProyecto = 10;
$alumno1-> imprimir();

$alumno2 = new Alumno (); //esta es la forma mas tediosa de colocar getter y setter. Usando el otro metodo, simplemnte colocamos $xxx -> xxx = 
$alumno2-> setNombre("Ana Perez");
echo $alumno2-> getNombre();
$alumno2-> setDni("40123658");
$alumno2-> setEdad(25);
$alumno2-> setNacionalidad("Argentina");
$alumno2-> notaPhp = 9;
$alumno2-> notaPortfolio= 8;
$alumno2-> notaProyecto= 9;
$alumno2-> imprimir();

$docente = new docente();
$docente -> nombre = "Sergio Gonzalez";
$docente -> especialidad = docente:: ESPECIALIDAD_ECO;
$docente-> imprimir();
$docente-> imprimirEspecialidadeshabilitadas();

?>