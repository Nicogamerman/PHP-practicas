<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sesion clientes</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 m-2 text-center">
                <h1>Formulario de datos personales</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <form action="clientes_session.php" method="POST">
                    <div>
                        <label for="txtNombre">Nombre: </label>
                        <input type="text" name="txtNombre" class="form-control" required>
                    </div>
                    <div>
                        <label for="txtDni">Dni: </label>
                        <input type="text" name="txtDni" class="form-control" required>
                    </div>
                    <div>
                        <label for="txtEdad">Edad: </label>
                        <input type="number" name="txtEdad" class="form-control" required>
                    </div>
                    <div>
                        <label for="txtTelefono">Telefono: </label>
                        <input type="number" name="txtTelefino" class="form-control" required>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-7 sm-5">
            <h2>DATOS</h2>
        </div>
        <div>
            <table class=" table table-hover border">
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>DNI</th>
                        <th>EDAD</th>
                        <th>TELEFONO</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>

    </main>
</body>

</html>