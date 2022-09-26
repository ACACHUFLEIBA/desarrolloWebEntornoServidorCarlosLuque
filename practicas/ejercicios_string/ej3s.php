<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php

$ip="192.160.26.109/20";
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
//sacamos el ultimo y cuarto octal en este caso con la cadena, desde 0 hasta la "/"
$cuarto_octal=substr($ip,0,strpos($ip,"/"));
echo"el cuarto octal es $cuarto_octal<br/><br/>";

//guardamos el ultimo tramo desde la /+1 hasta el final
$ip=substr($ip,strpos($ip,'/')+1);
echo"el trozo que representa es $ip<br/>";
//sacamos la mascara desde / hasta el final
$mascara=substr($ip,0); //$ip = $mascara
echo" las mascara es $mascara<br/>";

//como ya tenemos el valor de la mascara lo restamos a 32, que es el número de bit que tiene una ipv4, ese numero es el que recorre de derecha a izquierda la ip,y pone unos o ceros
//dependiendo de si quiere la red (0) o el broacasr(1)
$variable_resta=32-$mascara;
//guardamos cada octal en una variable y lo transformamos en binario
 $binario1 = decbin ($primer_octal) ;
 $binario2 = decbin ($segundo_octal);
 $binario3 = decbin ($tercer_octal);
 $binario4 = decbin ($cuarto_octal);


// concatenamos los binarios y con str_pad y la funcion left le añadimos hasta 8 caracteres con valor 0
echo "el binario con puntos y rellenado es ";
echo str_pad($binario1,8,"0",STR_PAD_LEFT),".",str_pad($binario2,8,"0",STR_PAD_LEFT),".",str_pad($binario3,8,"0",STR_PAD_LEFT),".",str_pad($binario4,8,"0",STR_PAD_LEFT);
echo "<br/>";
// el binario sin puntos concatenamos con .
$binario_completo=str_pad($binario1,8,"0",STR_PAD_LEFT).str_pad($binario2,8,"0",STR_PAD_LEFT).str_pad($binario3,8,"0",STR_PAD_LEFT).str_pad($binario4,8,"0",STR_PAD_LEFT);
echo "el binario completo es sin puntos $binario_completo";
//separamos los ultimos numeros de la cadena dependiendo del numero de la mascara y lo almacenamos en una variable
$ultimos_numeros = substr($binario_completo,strlen($binario_completo)-$variable_resta);
echo "<br/>";
echo " la cadena de nuemros a remplazar es : $ultimos_numeros <br/><br/>";
echo "<br/>";
//reemplazamos los unos por ceros y lo guardamos de nuevo en una cadena
$ceros = str_replace("1","0",$ultimos_numeros);
//creamos una nueva variable y reemplazoms en la cadena binaria, la cadena que indica la direccion red, por la cadena de ceros
$binario_con_ceros=str_replace($ultimos_numeros,$ceros,$binario_completo);
echo "la direccion binaria con ceros es :$binario_con_ceros" ;
//esta función devuelve un array, separando la cadena cada 8 digitos, es decir el octal
$array_binarios = str_split($binario_con_ceros, 8);
echo "<br/>";
//cada octal lo transformamos a decimal
$array_binarios[0] = bindec($array_binarios[0]);
$array_binarios[1] = bindec($array_binarios[1]);
$array_binarios[2] = bindec($array_binarios[2]);
$array_binarios[3] = bindec($array_binarios[3]);

//unimos lo elementos del array con un punto
$direccion_red = implode('.', $array_binarios);

echo "la dirección red es:  $direccion_red";
echo "<br/>";
echo "suma ".($array_binarios[3])+1;
echo "<br/>";
echo "el rango de red:  $direccion_red";



//reemplazamos los 0 por unos y lo guardamos de nuevo en una cadena
$ceros = str_replace("0","1",$ultimos_numeros);
//creamos una nueva variable y reemplazoms en la cadena binaria, la cadena que indica la direccion red, por la cadena de ceros
$binario_con_ceros=str_replace($ultimos_numeros,$ceros,$binario_completo);
echo "<br/>";
echo "la direccion binaria con unos es :$binario_con_ceros" ;

//esta función devuelve un array, separando la cadena cada 8 digitos, es decir el octal
$array_binarios = str_split($binario_con_ceros, 8);
echo "<br/>";
//cada octal lo transformamos a decimal
$array_binarios[0] = bindec($array_binarios[0]);
$array_binarios[1] = bindec($array_binarios[1]);
$array_binarios[2] = bindec($array_binarios[2]);
$array_binarios[3] = bindec($array_binarios[3]);

//unimos lo elementos del array con un punto
$direccion_red = implode('.', $array_binarios);

echo "la dirección broadcast es:  $direccion_red";






?>
</BODY>
</HTML>