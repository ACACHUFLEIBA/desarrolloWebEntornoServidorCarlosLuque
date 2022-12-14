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

function calcularID($codigo)
{
    $chars = substr($codigo, 0, 2); //estan los caracteres que no son numericos
    $numero = (int)substr($codigo, 2, strlen($codigo)); //tenemos los los caracteres numericos
    $numero++;
    $codigo = $chars . str_pad($numero, 3, "0", STR_PAD_LEFT); //codigo es la concatenacion de los caracteres no numéricos y los numéricos

    return $codigo;
}

function comprobarNumeroFilas($conn)
{

    $stmt = $conn->prepare("SELECT COUNT(*) FROM categoria");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // var_dump($result);
    $numeroFilas = "";
    foreach ($result as $key => $valor) {
        $numeroFilas =  $valor['COUNT(*)'];
    }
    return  $numeroFilas;
}

function obtenerIdsTablaCategoria($conn){

    $stmt = $conn->prepare("SELECT id_categoria FROM categoria");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    echo "---".count($result);
    var_dump($result);
    foreach ($result as $key => $valor) {
        $numeroFilas =  $valor['id_categoria'];
    }
    return $numeroFilas;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>

<!-- Alta de Categorías (comaltacat.php): dar de alta categorías de productos. El id_categoria
será un campo con el formato C-xxx donde xxx será un número secuencial que comienza en 1
completándose con 0 hasta completar el formato (este campo será calculado desde PHP). -->