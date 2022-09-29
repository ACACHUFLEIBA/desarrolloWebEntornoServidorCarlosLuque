<HTML>
<HEAD><TITLE> pmodificar el ejercicio anterior para mostrar la suma de los elementos por filas y por
columnas. Los valores se almacenarán en dos arrays.

 </TITLE></HEAD>
<BODY>
<?php
 
$contador=0;
$matrizPares[][]=array();

echo "<table border='1'>";
for($fila = 0; $fila < 3; $fila++){
    echo "<tr>";
    for($columna =0 ; $columna <= 2; $columna++){     
        $contador+=2;     
        $matrizPares[$fila][$columna]=$contador;// si esta operación la hacemos dentro de los td, no reconoce los
        //valores como int, si no como string
        echo "<td>".$contador."</td>";
        echo " ";
    }
        echo "</tr>";
        
}
echo "</table>";


echo "<br><br>";
$array_filas=array();//generamos un array en el que voy almacenar los resularados de las sumas de cada fila
$array_columnas=array();
for($i=0;$i < count($matrizPares);$i++){
    $suma_filas=0;//creamos la variable donde se va almacenar el resulatado de las sumas,
                 // y la reiniciamos a 0 para la siguiente vuelta
   $suma_columnas=0;
    for($j =0;$j < count($matrizPares[$i]);$j++){//count($matrizPares[$i] la idea de de poner el $i, es por que si las filas de la matriz no son iguales,
                                                 //daría un error al salirse del rango por obligarle a ir a un número fijo
        // echo gettype($matrizPares[$i][$j]); para saber el tipo de la variable matriz
        $suma_filas+=intval($matrizPares[$i][$j]);//sumamos cada celda de cada fila y la almacenamos
        $suma_columnas+=intval($matrizPares[$j][$i]);
    }
    $array_filas[]=$suma_filas;//volcamos cada suma en el array que creamos para almacenar y mostrar la suma
    $array_columnas[]=$suma_columnas;//volcamos cada sum
}
print_r($array_filas);
echo"<br>";
print_r($array_columnas);


?>

   
</BODY>
</HTML>