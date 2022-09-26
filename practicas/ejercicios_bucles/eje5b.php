<HTML>
<HEAD><TITLE> EJ5B – Tabla multiplicar con TD</TITLE></HEAD>
<BODY>
<?php

$numero="3";
$resultado="";

echo"<table align=center  border=1>";

for($i = 1;$i <=10;$i++){
    $resultado = $numero*$i;
    echo"<tr>";
    echo"<td align=center>$numero x $i </td>";   
    echo"<td align=center> $resultado  </td>";
    echo"</tr>";
   
}
echo"</table>";



?>
</BODY>
</HTML>
