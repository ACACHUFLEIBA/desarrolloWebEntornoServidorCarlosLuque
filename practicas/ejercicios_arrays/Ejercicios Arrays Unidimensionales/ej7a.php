<HTML>
<HEAD><TITLE> crear un array asociativo con los nombres de 5 alumnos y la edad de cada uno de ellos. Se pide:

 </TITLE></HEAD>
<BODY>
<?php
$arrayAsociativo=[
    'Pepe'=>24,
    'Ana'=>32,
    'Luis'=>18,
    'Juan'=>21,
    'Alicia'=>23
];
echo"Mostrar el contenido del array utilizando bucles";
echo"<br/><br/>";
    foreach($arrayAsociativo as $nombre => $edad){
        echo "la clave es: ". $nombre." y el valor es: ".$edad."<br/>";
    }
echo"<br/>Sitúa el puntero en la segunda posición del array y muestra su valor <br/>";
printf("<br>");
printf(next($arrayAsociativo));
printf("<br>");

    var_dump($arrayAsociativo["Ana"]);

echo"<br/>podemos crear un array multidimensional para poder darle valor a los indices <br/>";
$arrayMultidimensional = array( array('nombre'=>"Pepe",'edad'=>"24"),
                                array('nombre'=>"Ana",'edad'=>"32"),
                                array('nombre'=>"Luis",'edad'=>"18"),
                                array('nombre'=>"Juan",'edad'=>"21"),
                                array('nombre'=>"Alicia",'edad'=>"23"),
);
echo $arrayMultidimensional[1]['nombre'];
echo"<br/>si queremos mosstrar las posiciones y los valores <br/>";

foreach($arrayMultidimensional as $posicion => $info){
    foreach($info as $valor){
        echo "la posicion es : ".$posicion." y el valor es: ".$valor."<br/>";
    }
}




echo"<br/><br/>Avanza una posición y muestra el valor <br/>";
printf(next($arrayAsociativo));
printf("<br>");


echo $arrayMultidimensional[2]['nombre'];
echo"<br/><br/> Coloca el puntero en la última posición y muestra el valor <br/>";
echo end($arrayAsociativo);
echo "<br>";
echo $arrayMultidimensional[count($arrayMultidimensional)-1]['nombre'];
echo"<br/><br/>";

echo"<br/><br/> Ordena el array por orden de edad (de menor a mayor) y muestra la primera posición del
array y la última. <br/>";
    asort($arrayAsociativo);
    foreach ($arrayAsociativo as $clave => $valor) {
    echo $clave." tiene ". $valor."<br/>";
    }

?>
</BODY>
</HTML>