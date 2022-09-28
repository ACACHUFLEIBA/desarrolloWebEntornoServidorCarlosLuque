<HTML>
<HEAD><TITLE> : definir un array y almacenar los 20 primeros números impares. Mostrar en la salida
una tabla como la de la figura
 </TITLE></HEAD>
<BODY>
<?php

$suma= 0;
$contadorImpares=0;
$suma=0;
$impares=array();
echo "<table border ='1'>";
echo "<th>Indice</th><th>Valor</th><th>Suma</th>";
    echo "<tr>";
for($i = 0 ;$contadorImpares < 20 ; $i++){
    
    if($i%2 !=0){
        
        $impares[]=$i;
        $contadorImpares++;    
    }
       
}

for($i = 0 ;$i < count($impares); $i++){
    $suma=$suma+$impares[$i];
     echo("<td>".$i."</td>");
     echo("<td>".$impares[$i]."</td>");
     echo("<td>".$suma."</td>");
     echo "</tr>";
     $contadorImpares++; 
}

?>
</BODY>
</HTML>