<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('error_reporting', E_ALL);

//vemos si son admitidos los invitados:
if(file_exists("invitados.txt")){
    $aInvitados = explode(",",file_get_contents("invitados.txt")); //explode me genera un array con cada valor de invitados.
} else {
    $aInvitados = array(); //si no hay informacion, se crea un array vacio para que no nos genere un error.
}

if ($_POST) {
    if (isset($_REQUEST['btnProcesar'])) {
        $nombre = trim($_REQUEST['txtNombre']);
        if (in_array($nombre, $aInvitados)) {

            $aMensaje = array("texto" => "¡Bienvenid@ $nombre a la fiesta!", 
                              "estado" => "success");
        } else {
            $aMensaje = array("texto" => "No se encuentra en la lista de invitados.", 
                              "estado" => "danger");
        }
    } else if (isset($_REQUEST['btnVip'])) {
        $respuesta = trim($_REQUEST['txtPregunta']);
        if ($respuesta == "verde") {
            $aMensaje = array("texto" => "Su código de acceso es " . rand(1000,9999), "estado" => "success");

        } else {
            $aMensaje = array("texto" => "Usted no tiene pase VIP", "estado" => "danger");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <title>Formaulario invitados</title>    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 pt-5 pb-3">
                <h1>Lista de invitados</h1>
            </div>
            <?php if(isset($aMensaje)): ?>
                <div class="col-12">
                    <div class="alert alert-<?php echo $aMensaje["estado"]; ?>" role="alert">
                    <?php echo $aMensaje["texto"]; ?>
                    </div>
                </div>
            <?php endif; ?>
            <div>
                <h4>Complete el siguiente formulario:</h4>
            </div>
            <div class="col-6">
            <form method="POST" action="">
                <div>
                    <label for="txtTitulo">Dni</label>
                    <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                    <div class="py-3">
                        <button type="submit"  name="btnProcesar" class="btn btn-primary" value="Verificar invitado">Verificar invitado</button>
                    </div>
                <div>           
            </div>
            <div>
                <div>
                    <label for="txtTitulo">Ingrese el codigo secreto para el pase VIP:</label>
                    <input type="text" name="txtPregunta"  class="form-control">
                    <div class="py-3">
                        <button type="submit" name="btnVip" class="btn btn-primary" value="Verificar código">Verificar codigo</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>    
</body>
</html>