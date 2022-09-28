<HTML>
<HEAD><TITLE> crear un array asociativo con los nombres de 5 alumnos y la nota de cada uno de
ellos en Bases Datos. Se pide:


 </TITLE></HEAD>
<BODY>
<?php

$arrayAsociativo=[
    'Pepe'=>10,
    'Ana'=>7,
    'Luis'=>0,
    'Juan'=>6,
    'Alicia'=>3
];
echo"<strong>Mostrar el alumno con mayor nota.</strong>";
echo"<br/><br/>";
$mayor = max($arrayAsociativo);

foreach ($arrayAsociativo as $clave=>$valores) {
    if ($valores == $mayor) {
        $nombre=$clave;  
    }
}
echo "El alumno con mayor nota es: $mayor y su nombre es: $nombre";
echo"<br/><br/>";
echo"<strong>Mostrar el alumno con menor nota.</strong>";
echo"<br/><br/>";
$menor = min($arrayAsociativo);

foreach ($arrayAsociativo as $clave=>$valores) {
    if ($valores == $menor) {
        $nombre=$clave;  
    }
}
echo "El alumno con menor nota es: $menor y su nombre es: $nombre";
echo"<br/><br/>";

echo"<strong> Media notas obtenidas por los alumnos.</strong>";
echo"<br/><br/>";
$suma=0;
$media=0.0;
foreach ($arrayAsociativo as $clave=>$valores) {
   
   $suma=($suma+$valores);

}

    $media=$suma/count($arrayAsociativo);
echo "la media es: ".$media;
?>

   
</BODY>
</HTML>