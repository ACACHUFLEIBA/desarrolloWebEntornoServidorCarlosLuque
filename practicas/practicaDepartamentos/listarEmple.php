<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="width=device-width" />
    <script type="text/javascript" src="js/players_fieldText.js"></script>


</head>

<body>
    <h1>LISTAR EMPLEADO DEL DEPARTAMENTO</h1>

    <form method="POST" name="alta_empleado" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="">Elige el departamento en el desplegable</label></br></br>
        <?php

            include "funciones/funciones.php";
            $conn = conexion();
            $resultado = crearSelect($conn, "SELECT NOMBRE from DPTO");
            crearSelectDpto($resultado);
            $conn = null;

        ?>
        </br></br>

        <input type="submit" name="listar" value="listar">
        
    </form>

</body>

<?php

if (isset($_POST['listar'])){

    try{

      $conn=conexion();
        crearListado($conn);    


    }catch(PDOException $e){

        echo "no se pudo listar el departamento :" .$e->getMessage();

    }


}



?>