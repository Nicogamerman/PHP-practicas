<?php 
function calcularNeto ($bruto){
    return $neto= $bruto-($bruto*0.17);
}
    echo "El sueldo neto es: " .calcularNeto(5000);
    
?>