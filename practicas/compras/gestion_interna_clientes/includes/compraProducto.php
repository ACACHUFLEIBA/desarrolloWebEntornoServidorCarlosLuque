<?php

function crearCompra($conn){

try{   
        $nif=test_input($_POST['nif']);
        $producto=test_input($_POST['producto']);
        $fecha = date("y-m-d");
        $unidades=test_input($_POST['unidades']);
        
        $patron= '/^[0-9]{8}[a-z]$/i';           
        if($nif =="" || preg_match($patron,$nif)!=1 || !nifExiste($conn,$nif)){
            echo "el nif no es correcto";
            exit;           
        }
       
    $stmt = $conn->prepare("INSERT INTO compra (NIF,ID_PRODUCTO,FECHA_COMPRA,UNIDADES) 
    VALUES (:nif,:producto,:fecha_compra,:cantidad)");

    $stmt->bindParam(':nif', $nif);
    $stmt->bindParam(':producto', $producto);
    $stmt->bindParam(':fecha_compra',$fecha);
    $stmt->bindParam(':cantidad', $unidades);  
    $stmt->execute();


    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function nifExiste($conn, $nif) {
    
    $stmt = $conn->prepare("SELECT NIF from compra WHERE NIF=:nif");
    $stmt->bindParam(':nif', $nif);
    $stmt->execute(); 

    return $stmt->fetchColumn() !== false; 
  }

?>    