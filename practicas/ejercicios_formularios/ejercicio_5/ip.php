
<?php

$ip= $_POST["ip"];
separarIp($ip);


function separarIp($ip){

   $parte=strtok($ip,".");
   $contadorPuntos=0;

   while($parte !== false){
      echo decbin($parte);
      if($contadorPuntos<3){       
         echo ".";
         $contadorPuntos++;

      }     
      $parte=strtok(".");
      
   }

}



   

// function test_input($data) {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
//   }

?>
