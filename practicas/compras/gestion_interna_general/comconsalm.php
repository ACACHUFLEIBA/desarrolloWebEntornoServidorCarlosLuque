<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="width=device-width" />
    <script type="text/javascript" src="js/players_fieldText.js"></script>
</head>

<body>
    <h1>MOSTRAR INFO PRODUCTOS DE.</h1>

    <form method="POST" name="mostrar_info_almacenes" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <!-- crear lista de ALMACENES desplegable  -->
        <label for="">Elige el producto</label>
        <?php
        include "includes/mostrarInfoAlmacenes.php";
        $conn = conexion();
        $almacenes = crearSelect($conn, "SELECT LOCALIDAD from almacen");
        crearSelectProdu($almacenes);

        ?>

        </br></br>
        <input type="submit" name="mostrar" value="mostrar">
    </form>

</body>

<?php
        //mostrar info//
        if(isset($_POST['mostrar'])){
          
           mostrarInfo($conn);
          

            
        }
  

    
    
    
?>