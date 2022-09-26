<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario </TITLE></HEAD>
<BODY>
<?php

$num="128";
$binario = "";

while($num / 2 != 0){
    $binario.= $num % 2;
    $num= $num / 2;
    $num=intval($num);

}

echo "<br/>";
echo strrev($binario);
  

?>
</BODY>
</HTML>