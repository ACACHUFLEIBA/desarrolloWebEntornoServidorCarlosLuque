<?php
function crearAlmacen($conn){

    $localidad_almacen=$_POST['nombre_loc'];

    try{

        $stmt=$conn->prepare("INSERT INTO almacen (LOCALIDAD)VALUES (:nombre_almacen)");
        $stmt->bindParam(':nombre_almacen',$localidad_almacen);
        $stmt->execute();

        echo "<br> se ha creado el almacen de ".$localidad_almacen."<br>";
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>