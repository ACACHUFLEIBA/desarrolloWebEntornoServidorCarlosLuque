<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="width=device-width" />
    <script type="text/javascript" src="js/players_fieldText.js"></script>


</head>

<body>
    <h1>MODIFICAR SALARIO</h1>

    <form method="POST" name="alta_empleado" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="">Elige el DNI en el desplegable</label>

        <?php
        include "funciones/funciones.php";
        $conn = conexion();
        $dnis = crearSelect($conn, "SELECT DNI, SALARIO FROM emple");
        crearSelectDni($dnis);
        
        ?>
        <br>
        <input type="submit" name="mostrar" value="Mostrar Actual">
        <?php

        if (isset($_POST['mostrar'])) {
           
            try {
            $conn = conexion();
            $dni =  obtenerDniSeleccionado($conn);
            $salarioActual = salarioActual($conn);
            echo "<br> el salario actual es: ".  $salarioActual;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        ?>




        <br> <br>
        <label for="">introduce el nuevo salario</label>
        <input type="text" name="nuevo_salario">
        </br></br>

        <input type="submit" name="modificar" value="modificar">

    </form>

</body>

<?php


if (isset($_POST['modificar'])) {
   
        $conn = conexion();
        modificarSalario($conn);
}



?>