<HTML>
<HEAD><TITLE> : definir un array y almacenar los 20 primeros números binarios. Mostrar en la salida una tabla como la de la figura
 </TITLE></HEAD>
<BODY>
<?php
$binarios=array();
$octal=array();

$contadorBinarios= 0;
echo "<table border ='1'>";
echo "<th>Indice</th><th>binario</th><th>octal</th><th>binarioReversed</th>";
    echo "<tr>";
    //calculamos el binario
for($i= 0;$i < 20;$i++ ){
    $binarios[] = decbin($i);
  
}
$reversed = array_reverse($binarios);
    //calculamos el octal e imprimimos
    for($i= 0;$i < 20;$i++ ){
        $octal[] = decoct($i);
        
        echo("<td>".$i."</td>");
        echo("<td>".$binarios[$i]."</td>");
        echo("<td>".$octal[$i]."</td>");
        echo("<td>".$reversed[$i]."</td>");
    echo "</tr>";
    }
echo"</table>";

?>
</BODY>
</HTML>