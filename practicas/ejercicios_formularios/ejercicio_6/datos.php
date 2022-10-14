
<?php
function suma($operando1,$operando2){

    $resultado = $operando1 +$operando2;
    
    echo "<h1>resultado operacion: ".$resultado."</h1>"; 
}

function resta($operando1,$operando2){
 
        $resultado = $operando1 - $operando2;
        
        echo "<h1>resultado operacion: ".$resultado."</h1>"; 
    }



function multiplicacion($operando1,$operando2){
  
        $resultado = $operando1 * $operando2;
        
        echo "<h1>resultado operacion: ".$resultado."</h1>"; 
    }


function division($operando1,$operando2){
 

        $resultado = $operando1 / $operando2;
        
        echo "<h1>resultado operacion: ".$resultado."</h1>"; 
    }




    $operando1 = $_POST["operando1"];
    $operando2 = $_POST["operando2"];
    if(!is_numeric($operando1) || !is_numeric($operando2)){
        exit("[!] ERROR: Ambos operandos deben ser números válidos!<br>[!] ABORTANDO EJECUCIÓN");
    }
    
    $opcion = $_POST["operacion"];
    echo "<h1> La opción escogida ha sido: ".$opcion."</h1>"; 
        switch ($opcion){
            case "suma":
                suma($operando1,$operando2);
                break;
            case "resta":
                resta($operando1,$operando2);
                break;
            case "producto":
                multiplicacion($operando1,$operando2);
                break;  
            case "division":
                division($operando1,$operando2);
                break;    
    
        }

// function test_input($data) {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
//   }

?>
