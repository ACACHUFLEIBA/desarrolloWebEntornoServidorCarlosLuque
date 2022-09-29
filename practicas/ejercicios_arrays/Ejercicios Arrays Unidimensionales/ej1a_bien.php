<HTML>
<HEAD><TITLE> : definir un array y almacenar los 20 primeros números impares. Mostrar en la salida
una tabla como la de la figura
 </TITLE></HEAD>
<BODY>
<?php

$suma= 0;
$countTd= 0;
$suma=0;
echo "<table border ='1'>";
echo "<th>Indice</th><th>Valor</th><th>Suma</th>";
    echo "<tr>";
for($i = 1 ;$i < 40; $i+=2){
    $suma=$i+$suma;
    $impares= array("$i");
        echo("<td>".$countTd."</td>");
        echo("<td>".$i."</td>");
        echo("<td>".$suma."</td>");
    echo "</tr>";
    $countTd++;
    
}



?>
</BODY>
</HTML>