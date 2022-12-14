<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="width=device-width" />
    <script type="text/javascript" src="js/players_fieldText.js"></script>
</head>

<body>
    <h1>ALTA CLIENTE</h1>

    <form method="POST" name="alta_cliente" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <input type="text" name="nif" value="" placeholder="introduce el NIF"/>
        </br></br>
        <input type="text" name="nombre" value="" placeholder="introduce NOMBRE"/>
        </br></br>
        <input type="text" name="apellido" value="" placeholder="introduce APELLIDO"/>
        </br></br>
        <input type="text" name="cp" value="" placeholder="introduce CP"/>
        </br></br>
        <input type="text" name="direccion" value="" placeholder="introduce DIRECCION"/>
        </br></br>
        <input type="text" name="ciudad" value="" placeholder="introduce ciudad"/>
        </br></br>

        <input type="submit" name="alta" value="alta">
    </form>

</body>
<?php

include "../gestion_interna_general/includes/db_common.php";
include "includes/altacliente.php";

    $conn=create_conn();
    if(isset($_POST['alta'])){
        altaCliente($conn);
    }
     close_conn($conn);

?>