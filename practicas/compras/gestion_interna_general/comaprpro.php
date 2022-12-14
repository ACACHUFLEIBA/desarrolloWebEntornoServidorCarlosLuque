<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="width=device-width" />
    <script type="text/javascript" src="js/players_fieldText.js"></script>
</head>

<body>
    <h1>APROVISIONAR</h1>

    <form method="POST" name="aprovisionar" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <?php
        //crear select nombre producto
        include "includes/altaAprovisionamiento.php";
        $conn = conexion();
        $nombre_productos = crearSelect($conn, "SELECT nombre FROM producto");
        crearSelectProdu($nombre_productos);

        //crear select nombre almacén
        $nombre_almacenes = crearSelect($conn, "SELECT LOCALIDAD FROM almacen");
        crearSelectAlm($nombre_almacenes);

        ?>

        <input type="text" name="cantidad" value="" placeholder="introduce la cantidad " />
        </br></br>

        <input type="submit" name="alta" value="alta">
    </form>

</body>
<?php

if (isset($_POST['alta'])) {
    $numeroAlmacen = numeroDeAlmacen($conn);
    $idProducto = idPrducto($conn);
    crearAprovisionamiento($conn, $numeroAlmacen, $idProducto);
}
?>



