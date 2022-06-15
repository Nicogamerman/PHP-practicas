<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Cliente{
    protected $dni; 
    protected $nombre;
    protected $correo;
    protected $telefono;
    protected $descuento = 0.0;

    public function __construct(){
        $this -> descuento =0.0;
    }   
    
    public function __get($propiedad){ //esta es la forma mas simple de acortar todos los getter y setter, esto nos lo facilita php.
        return $this -> $propiedad;
    }

    public function __set($propiedad, $valor){ //forma simple de colocar el setter.
        $this -> $propiedad = $valor;
    }

    public function imprimir(){
        echo "Dni: " . $this -> dni . "<br>";
        echo "Nombre: " . $this -> nombre . "<br>";
        echo "Correo: " . $this -> correo . "<br>";
        echo "Telefono: " . $this -> telefono . "<br>";
        echo "Descuento: " . $this -> descuento . "<br><br>";        
    }
}

class Producto{
    protected $cod;
    protected $nombre;
    protected $precio = 0.0;
    protected $descripcion;
    protected $iva= 0.0;

    public function __construct(){
        $this -> precio =0.0;
        $this -> iva =0.0;
    }   

    public function __get($propiedad){ //esta es la forma mas simple de acortar todos los getter y setter, esto nos lo facilita php.
        return $this -> $propiedad;
    }

    public function __set($propiedad, $valor){ //forma simple de colocar el setter.
        $this -> $propiedad = $valor;
    }

    public function imprimir(){
        echo "Cod: " . $this -> cod . "<br>";
        echo "Nombre: " . $this -> nombre . "<br>";
        echo "Precio: " . $this -> precio . "<br>";
        echo "Descripcion: " . $this -> descripcion . "<br>";
        echo "Iva: " . $this -> iva . "<br><br>";
    }
}

class Carrito{
    protected $cliente;
    protected $aProductos = array();
    protected $subTotal = 0.0;
    protected $total= 0.0;
   
    public function __get($propiedad){ //esta es la forma mas simple de acortar todos los getter y setter, esto nos lo facilita php.
        return $this -> $propiedad;
    }

    public function __set($propiedad, $valor){ //forma simple de colocar el setter.
        $this -> $propiedad = $valor;
    }

    public function imprimirTicket(){
        echo "Cliente: " . $this -> cliente . "<br>";
        echo "Productos: " . $this -> aProductos . "<br>";
        echo "Sub Total: " . $this -> subTotal . "<br>";
        echo "Total: " . $this -> total . "<br>";               
    }
}


//Programa

$cliente1 = new Cliente();
$cliente1-> dni ="347654456";
$cliente1-> nombre = "Bernabé";
$cliente1-> correo = "bernabe@gmail.com";
$cliente1-> telefono = "+541188598686";
$cliente1-> descuento = 0.05;
$cliente1-> imprimir();

$producto1 = new Producto();
$producto1-> cod ="AB8767";
$producto1-> nombre = "Notebook 15'' HP";
$producto1-> descripcion = "Esta es una computadora HP";
$producto1-> precio = 30800;
$producto1-> iva = 21;
$producto1-> imprimir();

$producto2 = new Producto();
$producto2-> cod ="QWE579";
$producto2-> nombre = "Heladera Whirlpool";
$producto2-> descripcion = "Esta es una heladera no froze";
$producto2-> precio = 76000;
$producto2-> iva = 10.5;
$producto2-> imprimir();

$carrito = new Carrito();
$carrito->cliente = $cliente1;
print_r($carrito);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECO MARKET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <?php $carrito->imprimirTicket(); ?>
            </div>
        </div>
    </div>
</body>
</html>