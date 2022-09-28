<HTML>
<HEAD><TITLE> : pmodificar el ejemplo anterior para que calcule la media de los valores que están en
las posiciones pares y las posiciones impares.
 </TITLE></HEAD>
<BODY>
<?php

$suma= 0;
$contadorImpares=0;
$contadorPares=0;
$suma=0;
$impares=array();
$pares=array();
$mediaImpares=0;
$mediaPares=0;
echo "<table border ='1'>";
echo "<th>Indice</th><th>Valor</th><th>Suma</th>";
    echo "<tr>";
for($i = 0 ;$contadorImpares < 20 ; $i++){
    
    if($i%2 !=0){
        
        $impares[]=$i;
        $contadorImpares++;    
    }else{
        $pares[]=$i;
        $contadorPares++;
    }
       
}
for($i = 0 ;$i < count($pares); $i++){
    
     $contadorPares++; 
     $mediaPares+=$pares[$i]/count($pares);
}


for($i = 0 ;$i < count($impares); $i++){
    $suma=$suma+$impares[$i];
     echo("<td>".$i."</td>");
     echo("<td>".$impares[$i]."</td>");
     echo("<td>".$suma."</td>");
     echo "</tr>";
     $contadorImpares++; 
     $mediaImpares+=$impares[$i]/count($impares);
}
echo"</table>";
echo("la media de las posiciones impares: ". $mediaImpares);
echo"<br/>";
echo("la media de las posiciones pares: ". $mediaPares);
?>
</BODY>
</HTML>