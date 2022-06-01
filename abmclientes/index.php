<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);


    if(file_exists("archivo.txt")){ //si el archivo existe lo abrimos.
        //si el archivo existe, cargo los clientes en la variable aClientes
        $strJson = file_get_contents("archivo.txt"); //con file_get_contents busca y lee el archivo.txt
        $aClientes = json_decode($strJson, true); //se coloca true para que sepa que se tiene que convertir en un array o no.
    }

    else {
        //si el archivo no existe es porque no hay clientes
        $aClientes = array();

    }

    //si la persona completo todos los datos viene toda esta info:
     if($_POST){
            $dni = $_POST["txtDni"];
            $nombre = $_POST["txtNombre"]; 
            $telefono = $_POST["txtTelefono"];
            $correo = $_POST["txtCorreo"];
            $nombreImagen = "";
        
        $aClientes [] = array("nombre" => $nombre, //$aClientes [] me agrega un nuevo elemento al array, que seria el nuevo cliente.
                        "correo" => $correo,
                        "dni" => $dni,
                        "telefono" => $telefono,
        );   
             
    }
// else if(isset($_POST["btnNuevo"])){
//     session_unset(); 
//    } 

//Ahora tengo que convertir el array de cliente a JSON:
//Almacenar en un archivo.txt el JSON

    $strJson = json_encode($aClientes);
    file_put_contents("archivo.txt", $strJson);

    

    // //Para guardar archivos tenemos que hacer lo siguiente SIEMPRE:
    // function guardarArchivo(){
    //      if($_FILES["archivo"]["error"]=== UPLOAD_ERR_OK){ //se subio el archivo correctamente? si, entonces:
    //          $nombreAleatorio = date("Ymdhmsi"); //defino un nombre aleatorio que en este caso es la fecha, year month day hour minute second....
    //          $archivo_tmp = $_FILES["archivo"]["tmp_name"]; //defino la variable de archivo temporal para luego poder guardar el archivo           
    //          $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION); //busco la extension con path info
    //          if($extension=="png" || $extension =="jpg" || $extension == "jpeg" || $extension == "gif") //preguntamos si es alguna de las extensiones posibles
    //              move_uploaded_file($archivo_tmp,"files/$nombreAleatorio.$extension"); //si es correcto muevo el archivo de la carpeta de archivos temporales, a la carpeta de destino.
    //      }
    //  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Registro de clientes ABM</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Registro de clientes</h1>
            </div>
        </div>   
        <div class="row">
            <div class="col-6">                
                <form action="" method="POST" class="form" enctype="multipart/form-data"> 
                    <!-- multipart/form.data sirve para adjuntar archivos, hay otros atributos para adjuntar texto o enviar datos como query string -->

                    <label for="txtNombre">Nombre:</label>
                    <input type="text" name="txtNombre" class="form-control my-2">

                    <label for="txtDni">Dni:</label>
                    <input type="text" name="txtDni" class="form-control my-2">     
                    
                    <label for="txtTelefono">Telefono:</label>
                    <input type="text" name="txtTelefono" class="form-control my-2"> 

                    <label for="txtCorreo">Correo:</label>
                    <input type="text" name="txtCorreo" class="form-control my-2">                    

                    <div>
                        <input type="file" name="archivo1[]" id="archivo1" accept=".jpg, .jpeg, .png, .gif" multiple> (Archivos admitidos: .jpg .jpeg .png .gif)        
                    </div>       
                    <div class="py-2">
                        <button type="submit" name="btnEnviar" class="btn bg-primary text-white">Guardar</button>
                        <button type="submit" name="btnNuevo" class="btn bg-danger text-white">Nuevo</button>
                    </div>            
                       
                </form> 
            </div>
            <div class= "col-sm-6">
                <table class="table table-hover border">
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Telefono</th>
                        <th>Correo</th>   
                        <th>Acciones</th>                     
                    </tr>                                        
                        <?php foreach ($aClientes as $cliente): ?> <!-- //el foreach recibe el array $aClientes , as $cliente que va a ser cada cliente individual. -->
                            <tr>
                                <td></td>
                                <td> <?php echo $cliente["dni"]; ?> </td>
                                <td> <?php echo $cliente["nombre"]; ?></td>
                                <td> <?php echo $cliente["telefono"]; ?></td>
                                <td> <?php echo $cliente["correo"]; ?></td>
                                <td></td>
                            
                            </tr>
                        <?php endforeach; ?>                    
                </table>
            </div>  

        </div>

    </main>
    
</body>
</html>