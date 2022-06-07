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

    if(isset($_GET["id"])){
        $id = $_GET["id"];
    } else {
        $id="";
    }

    if(isset ($_GET["do"]) && $_GET["do"] == "eliminar"){  //viene por GET "do" esta definido? && (ademas) GET es igual a eliminar?
        unset($aClientes[$id]); //aca veo que cliente quiero eliminar, que viene por el ID
        //necesitamos actualizar el TXT para que se elimine definitivamente el usuario seleccionado
        //Convertir Aclientes en json
        $strJson = json_encode($aClientes); // quiero codificar aClientes, y me lo devuelva en una variable $strJson
        //Almacenar el json en el archivo
        file_put_contents("archivo.txt" , $strJson);

        header("location: index.php"); //envio de nuevo al inicio para limpiar la url
    }

    //si la persona completo todos los datos viene toda esta info:
    if($_POST){
        $dni = $_POST["txtDni"];
        $nombre = $_POST["txtNombre"]; 
        $telefono = $_POST["txtTelefono"];
        $correo = $_POST["txtCorreo"];
        $nombreImagen = "";
    
        // //Para guardar archivos tenemos que hacer lo siguiente SIEMPRE:
        if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
            $nombreAleatorio = date("Ymdhmsi") . rand(1000, 2000); //202205171842371010
            $archivo_tmp = $_FILES["archivo"]["tmp_name"]; //C:\tmp\ghjuy6788765
            $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
            if($extension == "jpg" || $extension == "png" || $extension == "jpeg"){
                $nombreImagen = "$nombreAleatorio.$extension";
                move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
            }
        }

        if($id >= 0){
            // Si no se subio una imagen y estoy editando conservar en $nombreImagen el nombre de la imagen anterior que esta asociada al cliente que estamos editando            
             if ($_FILES["archivo"]["error"] !== UPLOAD_ERR_OK) {
                $nombreImagen = $aClientes[$id]["imagen"];
             } else {
                //Si viene una imagen Y hay una imagen anterior, eliminar la anterior
                if(file_exists("imagenes/". $aClientes[$id]["imagen"])){
                    unlink("imagenes/". $aClientes[$id]["imagen"]);
                }
             }
                    
            //Estoy editando al cliente
            $aClientes[$id] = array("dni" => $dni,
                "nombre" => $nombre,
                "telefono" => $telefono,
                "correo" => $correo,
                "imagen" => $nombreImagen,
            );        
    }
        else{
            //Estoy insertando nuevo cliente aca
            $aClientes [] =  array (
                "dni" => $dni,
                "telefono"=> $telefono,
                "correo"=> $correo,
                "nombre" => $nombre,
                "imagen" => $nombreImagen,
            );
        }   
// else if(isset($_POST["btnNuevo"])){
//     session_unset(); 
//    } 

//Ahora tengo que convertir el array de cliente a JSON:
//Almacenar en un archivo.txt el JSON

    $strJson = json_encode($aClientes);
    file_put_contents("archivo.txt", $strJson);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
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
                    <input type="text" name="txtNombre" class="form-control my-2" require value="<?php echo isset($aClientes[$id])? $aClientes[$id]["nombre"] : ""; ?>">

                    <label for="txtDni">Dni:</label>
                    <input type="text" name="txtDni" class="form-control my-2" require value="<?php echo isset($aClientes[$id])? $aClientes[$id]["dni"] : ""; ?>">     
                    
                    <label for="txtTelefono">Telefono:</label>
                    <input type="text" name="txtTelefono" class="form-control my-2" require value="<?php echo isset($aClientes[$id])? $aClientes[$id]["telefono"] : ""; ?>"> 

                    <label for="txtCorreo">Correo:</label>
                    <input type="text" name="txtCorreo" class="form-control my-2" require value="<?php echo isset($aClientes[$id])? $aClientes[$id]["correo"] : ""; ?>">                    

                    <div>
                        <label for="">Archivo adjunto</label>
                        <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png">
                        <small class="d-block">Archivos admitidos: .jpg, .jpeg, .png</small>
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
                        <?php  foreach($aClientes as $pos => $cliente): ?> <!-- //el foreach recibe el array $aClientes , as $cliente que va a ser cada cliente individual. -->
                            <tr>
                                <td><img src="imagenes/<?php echo $cliente["imagen"]; ?>" class="img-thumbnail"></td>
                                <td> <?php echo $cliente["dni"]; ?> </td>
                                <td> <?php echo $cliente["nombre"]; ?></td>
                                <td> <?php echo $cliente["telefono"]; ?></td>
                                <td> <?php echo $cliente["correo"]; ?></td>
                                <td>
                                    <a href="?id=<?php echo $pos; ?>"><i class="fa-solid fa-pen-to-square"></a></i>
                                    <a href="?id=<?php echo $pos; ?>&do=eliminar"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            
                            </tr>
                        <?php endforeach; ?>                    
                </table>
            </div>  

        </div>

    </main>
    
</body>
</html>