<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php

$ip="1.2.3.40";
$num =$ip;
//imprimimos la ip con los cuatro octales
echo"la ip es $ip <br/>";
//sacamos el primer octal con substr(cadena entera,posicion 0,hasta primer .)
$primer_octal=substr($ip,0,strpos($ip,'.'));
echo"el primer octal es $primer_octal<br/><br/>";

//guardamos en $ip la nueva cadena desde la posicion primer . +1  con substr(cadena entera,strpos(4))
$ip=substr($ip,strpos($ip,'.')+1);
echo"la segunda ip es $ip <br/>";
//como $ip ahora son los tres ultimos octales, repetimos la opracion anterior para sacar el segundo octal (que seria el primero en esta ip)
$segundo_octal=substr($ip,0,strpos($ip,'.'));
echo"el segundo octal es $segundo_octal<br/><br/>";

//guardamos en $ip la nueva cadena desde la posicion primer . +1  con substr(cadena entera,strpos(4))
$ip=substr($ip,strpos($ip,'.')+1);
echo"la tercera ip es $ip <br/>";
//como $ip ahora son los dos ultimos octales, repetimos la opracion anterior para sacar el tercer octal (que seria el primero en esta ip)
$tercer_octal=substr($ip,0,strpos($ip,'.'));
echo"el tercer octal es $tercer_octal<br/><br/>";

//guardamos en $ip la nueva cadena desde la posicion primer . +1  con substr(cadena entera,strpos(4))
$ip=substr($ip,strpos($ip,'.')+1);
echo"la cuarta ip es $ip <br/>";
//sacamos en el ultimo y cuarto octal en este caso con la cadena, desde 0 hasta el final ya que no hay punto al final de la cadena
$cuarto_octal=substr($ip,0);

echo"el cuarto octal es $cuarto_octal<br/><br/>";

printf("Numero $num se representa en binario como %08b.%08b.%08b.%08b <br/>",$primer_octal ,$segundo_octal,$tercer_octal,$cuarto_octal);

?>
</BODY>
</HTML>