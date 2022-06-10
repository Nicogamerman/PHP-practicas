<?php

    $laptop = ["Acer nitro 5" , "windows 11" , "AMD Ryzen 5" , "SSD 256GB" , "RAM 24GB"]; //array con valores, sin claves.

    $frutas= [ //array asociativo, tiene clave con su valor.
        "Fresas" => 100,
        "Peras" => 30,
        "Sandias" => 10,
        "Melon" => 17,
        "Manzanas" => 9
    ];

    foreach($laptop as $valor){ //solo recorremos el valor, la variable $valor podria ser renombrada con cualquier otro nombre.
        echo $valor . "<br>";
    }

    
    //Para recorrer tanto el valor como la clave:
    foreach($frutas as $nombres => $cantidades){ //puedo ponerle el nombre que quiera a "nombres" y "cantidades".
        echo $nombres . " Tenemos: " . $cantidades ."<br>"; //veo tanto la clave, que seria el nombre de la fruta, como el valor, su cantidad.
    }

    $productos = [
        ["codigo"=> "A0001" , "descripcion" => "Mouse"],
        ["codigo"=> "A0002" , "descripcion" => "Teclado"],
        ["codigo"=> "A0003" , "descripcion" => "Monitor"],
        ["codigo"=> "A0004" , "descripcion" => "Gabinete"],
    ];
        foreach($productos as $aProducto){ //defino el array productos como aProducto
            echo $aProducto ["codigo"] . " - " . $aProducto["descripcion"] . "<br>"; //recorreo aProducto cada codigo, luego concateno con su descripcion. 
        }
    
    ?>