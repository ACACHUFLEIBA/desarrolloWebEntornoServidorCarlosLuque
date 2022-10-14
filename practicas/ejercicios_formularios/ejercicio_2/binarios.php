
<?php

$numero=test_input($_POST["numero"]);
convertirBinario($numero);

function convertirBinario($numero){
   return decbin($numero);
}

$mensaje = "el numero: ".$numero."<br>";
$mensaje = $mensaje."el binario: ".convertirBinario($numero)."<br>";

echo $mensaje;

   
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>
