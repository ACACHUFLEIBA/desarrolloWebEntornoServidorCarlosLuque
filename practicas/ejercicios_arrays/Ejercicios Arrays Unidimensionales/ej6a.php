<HTML>
<HEAD><TITLE> : definir tres arrays con los siguientes valores relativos a módulos que se imparten en
el ciclo DAW 

 </TITLE></HEAD>
<BODY>
<?php

$total=array();
$uno=array("Bases Datos","Entornos Desarrollo","Programación");
$dos=array("Sistemas Informáticos","FOL","Mecanizado");
$tres=array("Desarrollo Web EoDesarrollo Web","Despliegue Desarrollo Interfaces","Ingles");

//metemos cada array en una posicion de del array(lo convertimos en asociativo)
$arrayDeArrays = array($uno, $dos, $tres);


$arrayPush = [];
    for ($i = 0; $i < count($arrayDeArrays); $i++) {
        for ($j = 0; $j < count($arrayDeArrays[$i]); $j++) {
            array_push($arrayPush, $arrayDeArrays[$i][$j]);
        }
    }
    print_r($arrayPush);

    echo"<br/><br/>borrar mecanizado()<br/>";
    $arrayPush = array_diff($arrayPush, array("Mecanizado"));
    echo "el array sin mecanizado:\n";
    print_r($arrayPush);
    echo"<br/><br/>array al reves()<br/>";
    $alReves = array_reverse($arrayPush);
    print_r($alReves);
?>
</BODY>
</HTML>