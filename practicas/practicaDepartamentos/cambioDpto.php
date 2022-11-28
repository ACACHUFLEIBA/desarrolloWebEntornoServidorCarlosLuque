<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="width=device-width" />
    <script type="text/javascript" src="js/players_fieldText.js"></script>


</head>

<body>
    <h1>CAMBIO DEPARTAMENTO</h1>

    <form method="POST" name="alta_empleado" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="">Elige el DNI en el desplegable</label>
        <?php

        include "funciones/funciones.php";
        $conn = conexion();
        $dnis = crearSelect($conn, "SELECT DNI, SALARIO FROM emple");
        crearSelectDni($dnis);
        echo "<br><br>";



        ?>
        <label for="">DEPARTAMENTO ACTUAL</label>
        <input type="text" name="dpto_actual" value="<?php
        $dni="";
                                                        if (isset($_POST['mostrar'])) {
                                                            $conn = conexion();
                                                            dptoActual($conn);
                                                            $conn = null;
                                                            $dni=$_POST['todos'];
                                                          
                                                        }

                                                        ?>">
        <input type="submit" name="mostrar" value="Mostrar Actual"><br><br>



        <label for="">elige el departameno nuevo en el desplegable</label>
        <?php
        $conn = conexion();
        $resultado = crearSelect($conn, "SELECT NOMBRE from DPTO");
        crearSelectDpto($resultado);
                                                        
        ?>
        </br></br>

        <input type="submit" name="cambio" value="cambio">

    </form>

</body>

<?php

if(isset($_POST['cambio'])){
      
    try{
        $conn = conexion();
        cambioDpto($conn);

        echo "creado";
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    

}






?>