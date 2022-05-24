<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_POST){ //solo si es postback, osea si el usuario completo datos
    $nombre = $_POST["txtNombre"];
    $clave = $_POST["txtClave"];    

    $mensaje = "";

if ($nombre != "" && $clave != ""){
    header("Location: acceso-confirmado.php");}
    else {
        $mensaje =("Valido para usuarios registrados"); 
        
    }
}

//si nombre es distinto de vacio y clave es distinto de vacio entonces: redireccionar a acceso-confirmado.php
//sino
//$mensaje = "Valido para usuarios registrados."

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-3 text-center">
                <h1>Formulario</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php if (isset($mensaje)){ ?>
                    <div class="alert alert-danger" role="alert">
                    <?php echo $mensaje; ?>
                    </div>
                <?php } ?>                
                <form method="POST" action="">
                    <div>
                        <label for="txtNombre">Nombre</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                    </div>
                    <div>
                        <label for="txtCorreo">Clave</label>
                        <input type="password" name="txtClave" id="txtClave" class="form-control">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary my-3">ENVIAR</button>
                    </div>
                </form>
            </div>
        </div>
        <?php if(isset($mensaje)){ ?> //isset es una funcion de php que pregunta si la variable esta definida, si la variable esta definida es porque se le asigno un valor.
        <div class="row">
            <div class="col-12">
                <?php echo $mensaje; ?>
            </div>
        </div>
        <?php } ?>
    </main>
</body>
</html>