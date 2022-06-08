<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);



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
            <div>
                <h4>Complete el siguiente formulario:</h4>
            </div>
            <div class="col-6">
                <div>
                    <label for="txtTitulo">Dni</label>
                    <input type="text" name="txtDni" id="txtDni" class="form-control">
                    <div class="py-3">
                        <button type="submit" id="btnEnviar" name="btnEnviar" class="btn btn-primary">Verificar invitado</button>
                    </div>
                <div>           
            </div>
            <div>
                <div>
                    <label for="txtTitulo">Ingrese el codigo secreto para el pase VIP:</label>
                    <input type="text" name="txtDni" id="txtDni" class="form-control">
                    <div class="py-3">
                        <button type="submit" id="btnEnviar" name="btnEnviar" class="btn btn-primary">Verificar codigo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>