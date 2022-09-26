<HTML>
<HEAD><TITLE> EJ5B – Tabla multiplicar con TD</TITLE></HEAD>
<BODY>
<?php

$numero="3";
$resultado="";

echo"< table border=5 >";
for($i = 1;$i <=10;$i++){
    $resultado = $numero*$i;
    echo"<br/>";

    echo"$numero*$i=$resultado";
}



?>
</BODY>
</HTML>
