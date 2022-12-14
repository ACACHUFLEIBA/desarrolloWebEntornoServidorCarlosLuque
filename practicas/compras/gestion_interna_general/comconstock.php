<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="width=device-width" />
    <script type="text/javascript" src="js/players_fieldText.js"></script>
</head>

<body>
    <h1>MOSTRAR STOCK</h1>

    <form method="POST" name="mostrar_stock" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <!-- crear lista de categorias desplegable  -->
        <label for="">Elige el producto</label>
        <?php
        include "includes/mostrarStock.php";
        $conn = conexion();
        $productos = crearSelect($conn, "SELECT NOMBRE from producto");
        crearSelectProdu($productos);

        ?>

        </br></br>
        <input type="submit" name="mostrar" value="mostrar">
    </form>

</body>
<?php

    if(isset($_POST['mostrar'])){
        try{
            mostrarStock($conn);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

?>