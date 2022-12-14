<?php

function conexion()
{
    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "comprasweb";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error: no se ha podido establecer la conexión " . $e->getMessage();
    }
    return $conn;
}

function crearSelect($conn, $selecQuery)
{
    $stmt = $conn->prepare($selecQuery);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $resultado = $stmt->fetchAll();

    return $resultado;
}

function crearSelectProdu($nombre_productos)
{
    // var_dump($nombre_productos);
    echo "<select name='productos'>";
    foreach ($nombre_productos as $asociativo => $nombre) {

        echo "<option>" . $nombre['NOMBRE'] . "</option>";
    }
    echo "</select>";
}

function mostrarStock($conn){

    $nombre_producto=$_POST['productos'];
  //  var_dump($nombre_producto);
    $stmt=$conn->prepare("SELECT cantidad,localidad FROM almacena,producto,almacen where almacena.ID_PRODUCTO=producto.ID_PRODUCTO
     and almacena.NUM_ALMACEN=almacen.NUM_ALMACEN and producto.NOMBRE=:nombre_producto");
     $stmt->bindParam(':nombre_producto',$nombre_producto);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $resultado=$stmt->fetchAll();
    var_dump($resultado);
    $cantidad="";
    foreach($resultado as $producto){
       $cantidad= $producto['cantidad'];
       $almacen= $producto['localidad'];
       echo "quedan ".$cantidad." de ". $nombre_producto." en ".$almacen."<br>" ; 

    }
    
   
}




?>