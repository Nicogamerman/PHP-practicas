<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);
     
    //si existe el archivo invitados lo abrimos y cargamos en una variable del tipo array los DNIs permitidos    
    //sino el array queda como un array vacio 
    if(file_exists("invitados.txt")){         
        $strJson = file_get_contents("invitados.txt");
        $aInvitados = json_decode($strJson, true); 
    }
    else {        
        $aInvitados = array();
    }   
    
    if(isset($_POST["btnProcesar"])){ //si el dni ingresado se encuentra en la lista, se mostrara un mensaje de bienvenida
        $btnProcesar = $_GET["btnProcesar"];
    } else { //sino se mostrara un mensaje que no se encuentra en la lista de invitados
        $btnProcesar="";
    }  

    if(isset($_POST["btnVip"])){ //si el codigo es verde entonces mostrara su codigo de acceso es....
        $btnVip = $_GET["btnVip"];
    } else { //sino "Usted no tiene pase VIP"
        $btnVip="";
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
            <div>
                <h4>Complete el siguiente formulario:</h4>
            </div>
            <div class="col-6">
                <div>
                    <label for="txtTitulo">Dni</label>
                    <input type="text" name="txtDni" id="txtDni" class="form-control">
                    <div class="py-3">
                        <button type="submit" id="btnEnviar" name="btnProcesar" class="btn btn-primary">Verificar invitado</button>
                    </div>
                <div>           
            </div>
            <div>
                <div>
                    <label for="txtTitulo">Ingrese el codigo secreto para el pase VIP:</label>
                    <input type="text" name="txtDni" id="txtDni" class="form-control">
                    <div class="py-3">
                        <button type="submit" id="btnEnviar" name="btnVip" class="btn btn-primary">Verificar codigo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>