<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="width=device-width" />
    <script type="text/javascript" src="js/players_fieldText.js"></script>
</head>

<body>
    <h1>ALTA ALMACEN</h1>
    <p>el código del almacén se creará automaticamente</p>
    <form method="POST" name="alta_almacen" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <input type="text" name="nombre_loc" value="" placeholder="introduce la localidad " />
        </br></br>
             
        <input type="submit" name="alta" value="alta">
    </form>

</body>
<?php

    include "includes/db_common.php";
    include "includes/altaAlm.php";

    if(isset($_POST['alta'])){

        $conn=create_conn();
        crearAlmacen($conn);
        close_conn($conn);
    }

?>





<!-- Alta de Almacenes (comaltaalm.php): dar de alta almacenes en diferentes localidades. El
número de almacén será un número secuencial -->