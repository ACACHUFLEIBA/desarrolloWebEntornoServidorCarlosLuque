<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php

$ip="192.168.16.204";
$num =$ip;

$posicion_coincidencia = strpos( $ip, '.');//hallamos la primera posicion del primer punto
$primer_octal = substr($ip ,0, $posicion_coincidencia);//recorrmos la ip desdee la posicion 0 hasta la posicion del primer punto
printf("Numero $primer_octal  se representa en binario como %b <br/>",$primer_octal);//imprimimos el primer octal pasado a binario

$segundo_octal = substr($ip,$posicion_coincidencia+1,strpos($ip,'.')); //recorremos el ip desde la posicion del punto +1 hasta, hasta el segundo punto
printf("Numero $segundo_octal  se representa en binario como %b <br/>",$segundo_octal);

$ip=substr($ip, $posicion_coincidencia+1); // le damos nuevo valor a la $ip, lee ip y la le desde la posicion 4(168.16.204)
$posicion_coincidencia = strpos( $ip, '.');

$tercer_octal = substr($ip,$posicion_coincidencia+1,strpos($ip,'.')-1);//tercer octal va a ser la nueva $ip,(168.16.204), y va desde poscion 3 hasta el primer punto
printf("Numero $tercer_octal  se representa en binario como %b <br/>",$tercer_octal);

$ip=substr($ip,$posicion_coincidencia+1);
$posicion_coincidencia = strpos( $ip, '.');
$cuarto_octal = substr($ip,$posicion_coincidencia+1);
printf("Numero $cuarto_octal  se representa en binario como %b <br/>",$cuarto_octal);

printf("Numero $num se representa en binario como %08b.%08b.%08b.%08b <br/>",$primer_octal ,$segundo_octal,$tercer_octal,$cuarto_octal);

?>
</BODY>
</HTML>