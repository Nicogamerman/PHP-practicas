<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$listEmpleados = array();
$listEmpleados[] = array("dni" => 33300123, "nombre" => "David Garcia", "bruto" => 85000.30);
$listEmpleados[] = array("dni" => 40874456, "nombre" => "Ana Del Valle", "bruto" => 90000);
$listEmpleados[] = array("dni" => 67567565, "nombre" => "Andres Perez", "bruto" => 100000);
$listEmpleados[] = array("dni" => 75744545, "nombre" => "Victoria Luz", "bruto" => 70000);

function calcularNeto($bruto)
{
    return $bruto - $bruto * 0.17;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 py-3 text-center">
                <h1>Listado de empleados</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <tr>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Sueldo</th>
                    </tr>
                    <?php foreach ($listEmpleados as $empleado) { ?>
                        <tr>
                            <td><?php echo $empleado["dni"];  ?></td> <!-- primer bucle -->
                            <td><?php echo mb_strtoupper($empleado["nombre"]);  ?></td><!-- mb_strtoupper sirve para convertir a mayuscula -->
                            <td><?php
                                $importe = calcularNeto($empleado["bruto"]);
                                echo number_format($importe, 2, ",", ".");
                                ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="col-12">
                <p>Cantidad de empleados activos: <?php echo count($listEmpleados); ?> </p>
            </div>
        </div>
    </div>
</body>

</html>