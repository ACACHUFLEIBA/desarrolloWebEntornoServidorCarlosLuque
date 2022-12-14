<?php

function altaCliente($conn){

    try{   
        $nif=test_input($_POST['nif']);
        $nombre=test_input($_POST['nombre']);
        $apellido=test_input($_POST['apellido']);
        $cp=test_input($_POST['cp']);
        $direccion=test_input($_POST['direccion']);
        $ciudad=test_input($_POST['ciudad']);
        $patron= '/^[0-9]{8}[a-z]$/i'; 
           
        if($nif =="" || preg_match($patron,$nif)!=1){
            echo "el nif no es correcto";
            exit;           
        }
    $stmt = $conn->prepare("INSERT INTO cliente (NIF,NOMBRE,APELLIDO,CP,DIRECCION,CIUDAD) 
    VALUES (:nif,:nombre,:apellido,:cp,:direccion,:ciudad)");

    $stmt->bindParam(':nif', $nif);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':cp', $cp);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':ciudad', $ciudad);
    $stmt->execute();
    echo"alta de cliente correcto";
    }catch(PDOException $e){
      //  var_dump($e);
       foreach($e as $valor){
            if($valor[0]=='23000'){
            echo "El DNI introducido ya existe, introduzca uno que no exista";//.$e->getMessage();
             }
       
        }
    }    
}


?>