<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// a continuacion tres formas de resolver el problema, la forma 2 y 3 son mejores practicas ya que no se manipula tanto el archivo.

function print_f1($variable)
{
    if (is_array($variable)) {
        //Si es un array, lo recorro y guardo el contenido en el archivo “datos.txt”
        file_put_contents("datos.txt", "");
        $archivo1 = fopen("datos.txt", "a");
        foreach ($variable as $item) {
            fwrite($archivo1, $item . "\n");
        }
        fclose($archivo1);
    } else {
        //Entonces es string, guardo el contenido en el archivo “datos.txt”
        file_put_contents("datos.txt", $variable);
    }
    echo "Archivo actualizado.";
}

function print_f2($variable)
{
    if (is_array($variable)) {
        //Si es un array, lo recorro y guardo el contenido en el archivo “datos.txt”
        $contenido = "";
        $archivo1 = fopen("datos.txt", "w");
        foreach ($variable as $item) {
            $contenido .= $item . "\n";
        }
        fwrite($archivo1, $contenido);
        fclose($archivo1);
    } else {
        //Entonces es string, guardo el contenido en el archivo “datos.txt”
        file_put_contents("datos.txt", $variable);
    }
    echo "Archivo actualizado.";
}

function print_f3($variable) //Una función es un conjunto de instrucciones que a lo largo del programa van a ser ejecutadas multitud de veces.
{
    if (is_array($variable)) { //is_array comprueba si la variable es un array, y lo guarda en un archivo datos.txt
        $contenido = ""; // $contenido es igual a vacio, lo hacemos para declararla.
        foreach ($variable as $item) { // para cada $variable como $item
            $contenido .= $item . "\n"; //concatena contenido con item. Con esto evitaremos que file_put_contents nos pise el dato anterior.
        } 
        file_put_contents("datos.txt", $contenido); //file_put_contents sobreescribe todo, hay que hacer que coloque todas las notas sin pisar la anterior.

    } else {
        //Entonces es string, guardo el contenido en el archivo “datos.txt”
        file_put_contents("datos.txt", $variable);
    }
    echo "Archivo actualizado."; //al finalizar mostrar en pantalla el mensaje archivo actualizado.
}

//Uso
$aNotas = array(8, 5, 7, 9, 10, 11, 12);
$msg = "Esto es una prueba";
print_f3($aNotas);