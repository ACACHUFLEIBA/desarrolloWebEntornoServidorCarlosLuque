<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>CONVERSOR BINARIO</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        
        Número decimal <input type="text" name="numero">
        <br><br>

        <input type="submit" name="submit" value="enviar">
        <br><br>
        <input type="reset" name="reset" value="Borrar">
    </form>



<?php
 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
      $numero = $_REQUEST['numero'];
      if (empty($numero)) {
        echo "el numero esta vacio";
      } else {
        $numero=test_input($_POST["numero"]);
        convertirBinario($numero);
        $mensaje = "el numero: ".$numero."<br>";
        $mensaje = $mensaje."el binario: ".convertirBinario($numero)."<br>";
        
        echo $mensaje;
      }
    
    
    }
       
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      function convertirBinario($numero){
        return decbin($numero);
     }
    ?>
   

</body>
</html>

