<HTML>
<HEAD><TITLE> definir una matriz de 5x3 tal que en cada posición contenga el número
que resulta de sumar el número que identifica la j con el número que identifica la i del mismo,
imprimir los elementos de la matriz por columnas.

 </TITLE></HEAD>
<BODY>
<?php
 $matriz[][]=array();

 echo "<table border='1'>";

 for($i = 0; $i <= 2; $i++){
     echo "<tr>";
     for($j =0 ; $j <= 2; $j++){     
             
         $matriz[$i][$j]=rand(1,100);
         //valores como int, si no como string
         echo "<td>". $matriz[$i][$j]."</td>";
         echo " ";
     }
         echo "</tr>";
         
 }
 echo "</table>";

 
echo"<br>";
echo "maximos:";
echo"<br>";

$arrayMaximos[]= array();//a almacenar los maximos, 3 posiciones
$arraySuma[]= array();
$arrayMedia[]= array();
for($i = 0; $i < count($matriz); $i++){         
        $arrayMaximos[$i]= max($matriz[$i]);
        $arraySuma[$i]= 0;//iniciamos a 0 la primera posicion de la fila
        
        for($j = 0; $j < count($matriz[$i]); $j++){
        $arraySuma[$i]+= intval($matriz[$i][$j]);//en posicion $i sumamos los elemento de cada td
        
        }
        $arrayMedia[$i]=$arraySuma[$i]/count($matriz[$i]);
     }
print_r ($arrayMaximos);
echo"<br>";
print_r ($arrayMedia);
?>

   
</BODY>
</HTML>