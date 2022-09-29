<HTML>
<HEAD><TITLE> crear una matriz de 3x5 mostrarla por pantalla imprimiendo los elementos por fila 
en primer lugar y a continuación por columna .

 </TITLE></HEAD>
<BODY>
<?php
 
$contador=0;
$matriz[][]=array();

echo "<table border='1'>";
for($i = 0; $i <= 4; $i++){
    echo "<tr>";
    for($j =0 ; $j <=2; $j++){                  
        echo "<td>(".$i.",". $j.")</td>";
        echo " ";
    }
        echo "</tr>";
        
}
echo "</table>";


echo "<br /><br />";


for($i=0;$i <=4;$i++){
   
    for($j =0;$j <= 2;$j++){
        echo ("(".$i.",". $j.") = (elemento pos ".$i.",". $j.") - ");
    }
   echo ("<br />");
}
echo "<br /><br />";

for($i=0;$i <=4;$i++){
   
    for($j =0;$j <= 2;$j++){
        echo ("(".$j.",". $i.") = (elemento pos ".$j.",". $i.") - ");
    }
   echo ("<br />");
}

//(1,1) = (elemento pos 1,1) - (1,2)= (elemento pos 1,2) …
?>

   
</BODY>
</HTML>