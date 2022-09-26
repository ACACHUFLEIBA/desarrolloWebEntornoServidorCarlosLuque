<HTML>
<HEAD><TITLE> EJ6B – Factorial</TITLE></HEAD>
<BODY>

<?php
$num= 5;
$resultado= 1;

echo "$num!=";

for($i = $num ;$i >= 1; $i--){
    
  $resultado = $resultado * $i;
    echo " $i x ";
    
}
echo " = $resultado";

?>

</BODY>
</HTML>

