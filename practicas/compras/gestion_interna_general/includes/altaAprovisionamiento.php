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

        echo "<option>" . $nombre['nombre'] . "</option>";
    }
    echo "</select>";
}

function crearSelectAlm($nombre_almacenes)
{
    // var_dump($nombre_almacenes);
    echo "<select name='almacenes'>";
    foreach ($nombre_almacenes as $asociativo => $localidad) {

        echo "<option>" . $localidad['LOCALIDAD'] . "</option>";
    }
    echo "</select>";
}

function numeroDeAlmacen($conn)
{

    $localidad_almacen = $_POST['almacenes'];
    $stmt = $conn->prepare("SELECT num_almacen FROM almacen WHERE localidad=:localidad_almacen");
    $stmt->bindParam(':localidad_almacen', $localidad_almacen);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $resultado = $stmt->fetchAll();
    $numero_almacen = "";
    foreach ($resultado as $numero)
        $numero_almacen = $numero['num_almacen'];
    return $numero_almacen;
}

function idPrducto($conn)
{
    $nombre_producto = $_POST['productos'];
    $stmt = $conn->prepare("SELECT ID_PRODUCTO FROM producto WHERE NOMBRE=:nombre_producto");
    $stmt->bindParam(':nombre_producto', $nombre_producto);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $resultado = $stmt->fetchAll();
    $id_producto = "";
    foreach ($resultado as $ids) {
        $id_producto = $ids['ID_PRODUCTO'];
    }
    return $id_producto;
}

function crearAprovisionamiento($conn, $numeroAlmacen, $idProducto)
{

    try {
        $cantidad = test_input($_POST['cantidad']);
        $stmt = $conn->prepare("INSERT INTO almacena (NUM_ALMACEN,ID_PRODUCTO,CANTIDAD) VALUES (:num_almacen,:id_producto,:cantidad)");
        $stmt->bindParam(':num_almacen', $numeroAlmacen);
        $stmt->bindParam(':id_producto', $idProducto);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->execute();

        echo "se han introducido los datos correctamente";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
