<?php

class Venta{
    private $idventa;
    private $fk_idcliente;
    private $fecha;
    private $cantidad;
    private $preciounitario;
    private $total;
    private $fk_idproducto;
    private $nombre_cliente;
    private $nombre_producto;

    public function __construct()
    {
        $this->cantidad = 0.0;
        $this->preciounitario = 0.0;
        $this->total = 0.0;
    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
        return $this;
    }

    public function cargarFormulario($request) //Se acceden  a la informacion
    {
        $this->idventa = isset($request["id"]) ? $request["id"] : "";
        $this->fk_idcliente= isset($request["lstCliente"]) ? $request["lstCliente"] : "";
        if (isset($request["txtAnio"]) && isset($request["txtMes"]) && isset($request["txtDia"])) {
            $this->fecha= $request["txtAnio"] . "-" . $request["txtMes"] . "-" . $request["txtDia"];
        }
        $this->cantidad = isset($request["txtCantidad"]) ? $request["txtCantidad"] : "";
        $this->preciounitario = isset($request["txtPreciounitario"]) ? $request["txtPreciounitario"] : "";
        $this->total = isset($request["txtTotal"]) ? $request["txtTotal"] : "";
        $this->fk_idproducto= isset($request["lstProducto"]) ? $request["lstProducto"] : "";
       
    }

    public function insertar() 
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT); //Conectarse a la base de datos
        //Arma la query
        $sql = "INSERT INTO ventas (
                    fk_idcliente,
                    fecha,
                    cantidad,
                    preciounitario,
                    total,
                    fk_idproducto
                ) VALUES (
                    
                    '$this->fk_idcliente',
                    '$this->fecha',
                    '$this->cantidad',
                    '$this->preciounitario',
                    $this->total,
                    $this->fk_idproducto
                );";
               
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        //Obtiene el id generado por la inserción
        $this->idventa = $mysqli->insert_id;
        //Cierra la conexión
        $mysqli->close();
    }

    public function actualizar()
    {

        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "UPDATE ventas SET
                    fk_idcliente = $this->fk_idcliente,
                    fk_idproducto = $this->fk_idproducto,
                    fecha = '$this->fecha',
                    cantidad = $this->cantidad,
                    preciounitario = $this->preciounitario,
                    total = $this->total
                WHERE idventa = $this->idventa";
               
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function eliminar()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "DELETE FROM ventas WHERE idventa = " . $this->idventa;
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function obtenerPorId()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT idventa,
                        fk_idcliente,
                        fecha,
                        cantidad,
                        preciounitario,
                        total,
                        fk_idproducto
                FROM ventas 
                WHERE idventa = ". $this->idventa;

        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        //Convierte el resultado en un array asociativo
        if ($fila = $resultado->fetch_assoc()) {
            $this->idventa = $fila["idventa"];
            $this->cantidad = $fila["cantidad"];
            $this->preciounitario = $fila["preciounitario"];
            $this->total = $fila["total"];
            if(isset($fila["fecha"])){
                $this->fecha = $fila["fecha"];
            } else {
                $this->fecha = "";
            }
            $this->fk_idcliente = $fila["fk_idcliente"];
            $this->fk_idproducto = $fila["fk_idproducto"];
        }
        $mysqli->close();

    }

     public function cargarGrilla(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);  
        $sql = "SELECT 
                A.idventa,
                A.fecha,
                A.cantidad,
                A.fk_idcliente,
                B.nombre as nombre_cliente,
                A.fk_idproducto,
                A.total,
                A.preciounitario,
                C.nombre as nombre_producto
            FROM ventas A
            INNER JOIN clientes B ON A.fk_idcliente = B.idcliente
            INNER JOIN productos C ON A.fk_idproducto = C.idproducto
            ORDER BY A.fecha DESC";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        $aResultado = array();
        if($resultado){ 

            while($fila = $resultado->fetch_assoc()){
                $entidadAux = new Venta();
                $entidadAux->idventa = $fila["idventa"];
                $entidadAux->fk_idcliente = $fila["fk_idcliente"];
                $entidadAux->fk_idproducto = $fila["fk_idproducto"];
                $entidadAux->fecha = $fila["fecha"];
                $entidadAux->cantidad = $fila["cantidad"];
                $entidadAux->preciounitario = $fila["preciounitario"];
                $entidadAux->nombre_cliente = $fila["nombre_cliente"];
                $entidadAux->nombre_producto = $fila["nombre_producto"];
                $entidadAux->total = $fila["total"];
                $aResultado[] = $entidadAux;
            }
        }
        return $aResultado;
    
    }
    public function obtenerFacturacionMensual($mes){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE,);  //3310
        $sql = "SELECT SUM(total) AS total FROM ventas WHERE MONTH(fecha) = $mes";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $fila = $resultado->fetch_assoc();
        $mysqli->close();
        return $fila["total"];
    }

    public function obtenerFacturacionAnual($anio){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT SUM(total) AS total FROM ventas WHERE YEAR(fecha) = $anio";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $fila = $resultado->fetch_assoc();
        $mysqli->close();
        return $fila["total"];
    }
}
?>