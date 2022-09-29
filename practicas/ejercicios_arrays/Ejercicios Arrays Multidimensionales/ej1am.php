<HTML>
<HEAD><TITLE> crear una matriz de 3x3 con los sucesivos múltiplos de 2. Mostrar el contenido de la
matriz por filas tal y como se indica en la figura.


 </TITLE></HEAD>
<BODY>
<?php

// //$matriz[$i][$j]=$pares;
//  $matriz[0][0] = 12;
//  $matriz[0][1] = 13;
//  $matriz[0][2] = 14;
//  $matriz[1][0] = 11;
//  $matriz[1][1] = 12;
//  $matriz[1][2] = 13;
//  $matriz[2][0] = 15;
//  $matriz[2][1] = 16;
//  $matriz[2][2] = 17;

 
//  for ($j=0; $j < count($matriz); $j++) { 
//     for ($i = 0; $i < count($matriz); $i++) { 
//      echo $matriz[$j][$i];
//      echo " ";
//     }
//     echo "<br>";
//    }



$contado=0;
$matrizPares[][]=array();

for($fila = 0; $fila < 3; $fila++){
   
    for($columna =0 ; $columna <= 2; $columna++){     
        $contado+=2;     
              $matrizPares[$fila][$columna]=$contado;
             
    }
  
}
echo "<br>";


echo "<table border='1'>";


for ($j=0; $j < count($matrizPares); $j++) { 
    echo "<tr>";
    for ($i = 0; $i < count($matrizPares[$j]); $i++) { 
    // echo $matrizPares[$j][$i];
     echo"<td>".$matrizPares[$j][$i]."</td>";
     echo " ";
    }
    echo "</tr>";
    echo "<br>";
    }
    echo "</table>";
?>

   
</BODY>
</HTML>