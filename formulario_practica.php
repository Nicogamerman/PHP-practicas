<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Practica formulario</title>
</head>

<body>
    <main class="container">
        <div class="row text-center">
            <h1>Formulario</h1>
        </div>
        <div class="row">
            <div class="col-4">
                <form action="" method="POST" class="form">

                    <label for="txtNombre">Nombre:</label>
                    <input type="text" name="txtNombre" class="form-control my-2">

                    <label for="txtDni">DNI:</label>
                    <input type="text" name="txtDni" class="form-control my-2">

                    <label for="txtEdad">Edad:</label>
                    <input type="text" name="txtEdad" class="form-control my-2">

                    <label for="txtTelefono">Telefono:</label>
                    <input type="text" name="txtTelefono" class="form-control my-2">

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
                                                              
                    </tbody>
                </table>
            </div>
    </main>

</body>

</html>