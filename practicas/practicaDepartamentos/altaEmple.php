<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="width=device-width" />
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>

    <script type="text/javascript" src="js/players_fieldText.js"></script>

</head>

<body>
    <h1>ALTA EMPLEADO</h1>

    <form method="POST" name="alta_empleado" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="">introduce el DNI del empleado</label>
        <input type="text" name="dni" id="dni"><br>

        <label for="">introduce el Nombre del empleado</label>
        <input type="text" name="nombre" id="nombre"><br>

        <label for="">introduce el Salario del empleado</label>
        <input type="text" name="salario" id="salario"><br>

        <label for="">introduce el Fecha de nacimiento del empleado</label>
        <input type="text" name="fecha" id="fecha"><br>

        <label for="">elige el departamento</label>
        <?php
        //creamos el select de los departamentos con las siguientes funciones//
        include "funciones/funciones.php";
        $conn = conexion();
        $dptos = crearSelect($conn, "SELECT NOMBRE from DPTO");
        crearSelectDpto($dptos);


        $conn = null;
        ?>

        <br> <br><input type="submit" name="alta" value="alta">

    </form>

</body>

<?php
var_dump($_POST);

if (isset($_POST['alta'])) {

    $conn = conexion();
    $stmt = crearInsertEmple($conn, "INSERT INTO emple (DNI,NOMBRE,SALARIO,FECHA_NAC) values (:dni,:nombre,:salario,:fecha_nac)");
    
    $id = obtenerIdSeleccionado($conn);
    altaTablann($conn, $id);
}
?>