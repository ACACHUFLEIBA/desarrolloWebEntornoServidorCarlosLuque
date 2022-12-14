<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="width=device-width" />
    <script type="text/javascript" src="js/players_fieldText.js"></script>
</head>

<body>
    <h1>ALTA CATEGORIA</h1>

    <form method="POST" name="alta_categoria" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <input type="text" name="alta_cat" value="" placeholder="introduce la categoria"> </option>
        </br></br>
        <input type="submit" name="alta" value="alta">
    </form>

</body>

<?php
include "includes/altaCat.php";

//averiguar si la tabla esta vacia


if (isset($_POST['alta'])) {
    $conn = conexion();
    $numeroFilas = comprobarNumeroFilas($conn);

    if ($numeroFilas == 0) {
        $id = "C-001";
        $nombre = $_POST['alta_cat'];
        try {
            $stmt = $conn->prepare("INSERT INTO categoria (ID_CATEGORIA,NOMBRE) values (:id_categoria,:nombre)");
            $nombre = $_POST['alta_cat'];
            $stmt->bindParam(':id_categoria', $id);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->execute();

            echo " se ha creado satisfactoriamente la categoria el departamento " . $nombre . " con el código " . $id;
        } catch (PDOException $e) {
            echo "Error: no se ha podido insertar la categoria " . $e->getMessage();
        }
        $conn = null;
    } else {
        $ultimoId = obtenerIdsTablaCategoria($conn);

        $id = "C-" . $numeroFilas;
        echo "id " . $id . "<br>";
        $codigo = calcularID($ultimoId);
        echo $codigo . "<br>";
        $nombre = test_input($_POST['alta_cat']);
        try {
            $conn = conexion();
            $stmt = $conn->prepare("INSERT INTO categoria (ID_CATEGORIA,NOMBRE) values (:id_categoria,:nombre)");
            $nombre = $_POST['alta_cat'];
            $stmt->bindParam(':id_categoria', $codigo);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->execute();

            echo "se ha creado satisfactoriamente la categoria el departamento " . $nombre . " con el código " . $codigo;
        } catch (PDOException $e) {
            echo "Error: no se ha podido insertar la categoria " . $e->getMessage();
        }
        $conn = null;
    }
}
?>



<!-- Alta de Categorías (comaltacat.php): dar de alta categorías de productos. El id_categoria
será un campo con el formato C-xxx donde xxx será un número secuencial que comienza en 1
completándose con 0 hasta completar el formato (este campo será calculado desde PHP). -->



<!-- 
if (isset($_POST['alta'])) {
        $id = "C-000";
    try {
        $conn = conexion();
        $stmt = $conn->prepare("INSERT INTO categoria (ID_CATEGORIA,NOMBRE) values (:alta_dpto)");
        $nombre = $_POST['alta_dpto'];
        $stmt->bindParam(':alta_dpto', $nombre);
        $stmt->execute();

        echo " se ha creado satisfactoriamente el departamento";
    } catch (PDOException $e) {
        echo "Error: no se ha podido insertar el departamento ";
    }
    $conn = null;
} -->