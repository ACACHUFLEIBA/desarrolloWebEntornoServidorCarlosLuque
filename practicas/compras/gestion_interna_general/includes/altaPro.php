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

function crearSelectCat($resultado)
{

    echo "<select name='categorias'>";
    foreach ($resultado as $asociativo => $nombre) {

        echo "<option>" . $nombre['NOMBRE'] . "</option>";
    }
    echo "</select>";
}

function buscarId($conn)
{

    $categoria = test_input($_POST['categorias']);
    $stmt = $conn->prepare("SELECT ID_CATEGORIA FROM categoria where NOMBRE=:nombre_categoria");
    $stmt->bindParam(':nombre_categoria', $categoria);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // var_dump($result);
    $id = "";
    foreach ($result as $key => $valor) {
        $id = $valor['ID_CATEGORIA'];
    }

    return $id;
}


function comprobarNumeroFilas($conn)
{
    $stmt = $conn->prepare("SELECT COUNT(*) FROM producto");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    //  var_dump($result);
    $numeroFilas = "";
    foreach ($result as $key => $valor) {
        $numeroFilas =  $valor['COUNT(*)'];
    }
    return  $numeroFilas;
}

function obtenerUltimoIdProducto($conn)
{
//select max
    $stmt = $conn->prepare("SELECT id_producto FROM producto ORDER BY id_producto");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    var_dump($result);
    foreach ($result as $key => $valor) {
        $ultimo =  $valor['id_producto'];
    }
    echo $ultimo;
    return $ultimo;
}

function calcularId($codigo)
{
    $chars = substr($codigo, 0, 1); // los caracteres que no son numericos
    $numero = (int)substr($codigo, 1, strlen($codigo)); //tenemos los los caracteres numericos
    $numero++;
    echo $numero;
    $codigo = $chars . str_pad($numero, 4, "0", STR_PAD_LEFT); //codigo es la concatenacion de los caracteres no numéricos y los numéricos

    return $codigo;
}

function crearProducto($conn, $ultimoId, $nombre, $precio, $id_categoria)
{
     $idNuevo = calcularId($ultimoId);
     echo "--".$idNuevo;
    try {
        $stmt = $conn->prepare("INSERT INTO producto (ID_PRODUCTO,NOMBRE,PRECIO,ID_CATEGORIA) 
             VALUES (:id_producto,:nombre_prod,:precio_prod,:id_categoria)");
        $stmt->bindParam(':id_producto', $idNuevo);
        $stmt->bindParam(':nombre_prod', $nombre);
        $stmt->bindParam(':precio_prod', $precio);
        $stmt->bindParam(':id_categoria', $id_categoria);
        $stmt->execute();

        echo "se ha realizado el alta del producto ".$nombre;
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

?>

<!-- Alta de Categorías (comaltacat.php): dar de alta categorías de productos. El id_categoria
será un campo con el formato C-xxx donde xxx será un número secuencial que comienza en 1
completándose con 0 hasta completar el formato (este campo será calculado desde PHP). -->