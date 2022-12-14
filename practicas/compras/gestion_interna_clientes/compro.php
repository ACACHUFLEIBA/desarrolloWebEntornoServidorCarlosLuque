<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="width=device-width" />
    <script type="text/javascript" src="js/players_fieldText.js"></script>
</head>

<body>
    <h1>COMPRAR PRODUCTO</h1>

    <form method="POST" name="alta_cliente" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <input type="text" name="nif" value="" placeholder="introduce el NIF"/>
        </br></br>      
        <input type="text" name="producto" value="" placeholder="introduce producto"/>
        </br></br>
        <input type="text" name="unidades" value="" placeholder="introduce unidades"/>
        </br></br>

        <input type="submit" name="alta" value="comprar">
    </form>

</body>
</html>
<?php
    include "../gestion_interna_general/includes/db_common.php";
    include "../gestion_interna_clientes/includes/compraProducto.php";

    if(isset($_POST['comprar'])){
    $conn=create_conn();
    crearCompra($conn);

    }





?>