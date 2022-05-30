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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Registro de clientes</title>
</head>
<body>
    <main class="container">
        <div class="row text-center py-5">
            <h1>Registro de clientes</h1>
        </div>
        <div class="row">
            <div class="col-6">                
                <form action="" method="POST" class="form" enctype="multipart/form-data"> 
                    <!-- multipart/form.data sirve para adjuntar archivos, hay otros atributos para adjuntar texto o enviar datos como query string -->

                    <label for="txtDni">DNI:</label>
                    <input type="text" name="txtDni" class="form-control my-2">

                    <label for="txtNombre">Nombre:</label>
                    <input type="text" name="txtNombre" class="form-control my-2">     
                    
                    <label for="txtTelefono">Telefono:</label>
                    <input type="text" name="txtTelefono" class="form-control my-2"> 

                    <label for="txtEdad">Correo:</label>
                    <input type="text" name="txtCorreo" class="form-control my-2">

                    <div>
                        <input type="file" name="archivo1[]" id="archivo1" accept=".jpg, .jpeg, .png, .gif" multiple>                    
                        <button type="submit">Enviar</button>

                    </div>                   
                       
                </form> 
            </div>
            <div class= "col-6">
                <table class="table table-hover">
                    <thead>
                        <th>Imagen:</th>
                        <th>DNI:</th>
                        <th>Nombre:</th>
                        <th>Correo:</th>
                        <th>Acciones:</th>
                    </thead>
                </table>
            </div>  

        </div>

    </main>
    
</body>
</html>