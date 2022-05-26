<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

//cuando haga click en el submit de la web va a hacer que se recargue todo el archivo y a traves de php poder capturar los datos siempre y cuando haya POST BACK
session_start(); //indica que utilizaremos variables de session,  Iniciar una nueva sesión o reanudar la existente mediante una petición GET o POST
//session_destroy(); //lo use para eliminar los datos que me habian quedado guardados de la prueba anterior (queda en el servidor local si no se elimina)
if ($_POST){ //si la persona completo todos los datos viene toda esta info:

    if(isset($_POST["btnEnviar"])){

    $nombre = $_POST['txtNombre'];
    $edad = $_POST['txtEdad'];
    $dni = $_POST['txtDni'];
    $telefono = $_POST['txtTelefono'];

    $cliente = array("nombre" => $nombre,
                     "edad" => $edad,
                     "dni" => $dni,
                     "telefono" => $telefono);
                    

    // la persona hizo click en enviar, entraron los datos por $_POST y hay que almacenarlo en la variable de session, el cual es un array asociativo.
    $_SESSION['listadoClientes'][] = $cliente;
    }

    else if(isset($_POST["btnEliminar"])){
        session_unset(); 
        //session_destroy(); al usarlo hay que clickear dos veces para que elimine los registros en la web (no se exactamente porque es asi.)
        //print_r ($_SESSION);
        echo ("llego al metodo");
    }    
}

//if(!isset) es la funcion para saber si la variable existe o no existe. Usamos ! para que sea negativo.
if(!isset ($_SESSION["listadoClientes"])){ //pregunto si NO esta seteada la variable "listadoClientes"

    $_SESSION["listadoClientes"] = array(); //si no esta seteada, la creo.
}

//print_r ($_SESSION); //esto es para poder ver los datos en el codigo fuente de la pagina

//si yo agrego algo en el formulario, me tiene que agregar el dato en la lista de la derecha

//cada vez que un cliente ingrese sus datos se va a ir almacenando uno debajo del otro.

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de clientes</title>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1> Listado de clientes </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-1 me-5">
                <form action="" method="POST" class="form">  <!--lo va a procesar este mismo archivo, osea al estar vacio lo procesa a si mismo -->
                    <label for="txtNombre"> Nombre:</label>
                    <input type="text" name="txtNombre" class="form-control my-2" placeholder="Nombre y apellido">

                    <label for="txtDni">DNI:</label>
                    <input type="text" name="txtDni" class="form-control my-2">

                    <label for="txtTelefono">Telefono:</label>
                    <input type="tel" name="txtTelefono" class="form-control my-2">

                    <label for="txtEdad">Edad:</label>
                    <input type="text" name="txtEdad" class="form-control my-2">

                    <button type="submit" name="btnEnviar" class="btn bg-primary text-white">Enviar</button>
                    <button type="submit" name="btnEliminar" class="btn bg-danger text-white">Eliminar</button>
                </form>
            </div>
            <div class="col-6 ms-5">
                <table class="table table-hover">
                    <thead>
                        <th>Nombre:</th>
                        <th>DNI:</th>
                        <th>Telefono:</th>
                        <th>Edad:</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($_SESSION["listadoClientes"] as $cliente): ?> <!-- //el foreach recibe el array $listadoClientes , as $cliente que va a ser cada cliente individual. -->
                            <tr>
                                <td> <?php echo $cliente["nombre"] ?> </td>
                                <td> <?php echo $cliente["dni"] ?></td>
                                <td> <?php echo $cliente["telefono"] ?></td>
                                <td> <?php echo $cliente["edad"] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>              
                </table>
            </div>
        </div>
    </div>
</body>

</html>