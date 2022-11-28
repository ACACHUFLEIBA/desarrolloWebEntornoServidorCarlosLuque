<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="width=device-width" />
    <script type="text/javascript" src="js/players_fieldText.js"></script>
</head>

<body>
    <h1>ALTA DEPARTAMENTO</h1>

    <form method="POST" name="alta_departamento" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="">introduce el nombre del departamento</label>
        <input type="text" name="alta_dpto" value="alta_dpto"> </option>
        </br></br>
        <input type="submit" name="alta" value="alta">
    </form>

</body>

<?php
include "funciones/funciones.php";
if (isset($_POST['alta'])) {

    try {

        $conn = conexion();
        $stmt = $conn->prepare("INSERT INTO DPTO (NOMBRE) values (:alta_dpto)");
        $nombre = $_POST['alta_dpto'];
        $stmt->bindParam(':alta_dpto', $nombre);
        $stmt->execute();

        echo " se ha creado satisfactoriamente el departamento";
    } catch (PDOException $e) {
        echo "Error: no se ha podido insertar el departamento ";
    }
    $conn = null;
}
?>