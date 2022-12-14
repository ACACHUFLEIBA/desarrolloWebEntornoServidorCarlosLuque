<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="width=device-width" />
    <script type="text/javascript" src="js/players_fieldText.js"></script>
</head>

<body>
    <h1>ALTA CATEGORIA</h1>

    <form method="POST" name="alta_productos" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <input type="text" name="nombre_prod" value="" placeholder="introduce el nombre " />
        </br></br>
        <input type="text" name="precio_prod" value="" placeholder="introduce el precio " />
        <!-- crear lista de categorias desplegable  -->
        </br></br>
        <label for="">Elige la categoria</label>
        <?php
        include "includes/altaPro.php";
        $conn = conexion();
        $categorias = crearSelect($conn, "SELECT NOMBRE from categoria");
        crearSelectCat($categorias);

        ?>

        </br></br>
        <input type="submit" name="alta" value="alta">
    </form>

</body>
</html>
<?php
//averiguar si la tabla esta vacia para insertar el primer id

if (isset($_POST['alta'])) {
    $conn = conexion();
    $numeroFilas = comprobarNumeroFilas($conn);
    $nombre = $_POST['nombre_prod'];
    $precio = $_POST['precio_prod'];
   // echo $numeroFilas;
    if ($numeroFilas == 0) {
        $id_categoria = buscarId($conn); //averiguar el id de la categoria//
      //  echo $id_categoria;
        $id = "P0000";
        try {
            $stmt = $conn->prepare("INSERT INTO producto (ID_PRODUCTO,NOMBRE,PRECIO,ID_CATEGORIA) 
            VALUES (:id_producto,:nombre_prod,:precio_prod,:id_categoria)");
            $stmt->bindParam(':id_producto', $id);
            $stmt->bindParam(':nombre_prod', $nombre);
            $stmt->bindParam(':precio_prod', $precio);
            $stmt->bindParam(':id_categoria', $id_categoria);
            $stmt->execute();
            echo "se ha creado el producto $nombre";
        } catch (PDOException $e) {
            echo "no se ha creado el producto " . $e->getMessage();
        }
    } else {
       $ultimoId= obtenerUltimoIdProducto($conn);
     // echo $ultimoId;
       $id_categoria = buscarId($conn);
        try{
            $stmt = crearProducto($conn, $ultimoId, $nombre, $precio, $id_categoria);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}

?>




<!-- | Field        | Type        | Null | Key | Default | Extra |
+--------------+-------------+------+-----+---------+-------+
| ID_PRODUCTO  | varchar(5)  | NO   | PRI | NULL    |       |
| NOMBRE       | varchar(40) | YES  |     | NULL    |       |
| PRECIO       | double      | YES  |     | NULL    |       |
| ID_CATEGORIA | varchar(5)  | YES  | MUL | NULL    |       | -->