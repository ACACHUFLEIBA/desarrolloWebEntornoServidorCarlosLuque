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
    echo "<select name='almacenes'>";
    foreach ($nombre_productos as $asociativo => $nombre) {

        echo "<option>" . $nombre['LOCALIDAD'] . "</option>";
    }
    echo "</select>";
}
function mostrarInfo($conn){

    try{
        $localidad=$_POST['almacenes'];
        $stmt=$conn->prepare("SELECT producto.NOMBRE,producto.PRECIO,almacena.CANTIDAD
        FROM producto,almacena,almacen
        WHERE producto.ID_PRODUCTO = almacena.ID_PRODUCTO
        AND almacena.NUM_ALMACEN = almacen.NUM_ALMACEN and LOCALIDAD=:localidad");
        $stmt->bindParam(':localidad',$localidad);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado=$stmt->fetchAll();
        foreach($resultado as $productos){
          echo "PRODUCTO:".$productos['NOMBRE']."<br>PRECIO:".$productos['PRECIO']."<br>CANTIDAD:".$productos['CANTIDAD']."<br><br>";
        }

       // var_dump($resultado);


    }catch(PDOException $e){
        echo $e->getMessage();
    }
   


}

?>