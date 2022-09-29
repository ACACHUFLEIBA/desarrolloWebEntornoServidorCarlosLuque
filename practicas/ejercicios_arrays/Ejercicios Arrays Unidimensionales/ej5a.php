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
print_r($arrayDeArrays);
echo"<br/><br/>";
//sin usar funciones
$arrSinFunciones = [];
echo "el tamaño de arrayDeArrays ".sizeof($arrayDeArrays);
echo"<br/><br/>";
    for ($i = 0; $i < sizeof($arrayDeArrays); $i++) {
        print_r($arrayDeArrays[$i]);
        echo"<br/>";
        for ($j = 0; $j < sizeof($arrayDeArrays[$i]); $j++) {
            $arrSinFunciones[] = $arrayDeArrays[$i][$j];
           ;
        }
    }
    echo"<br/>";
    print_r($arrSinFunciones);
    echo"<br/>";
    echo "el tamaño de arraySinFunciones ".sizeof($arrSinFunciones);
    echo"<br/><br/>con merge()<br/>";
//array_merge()
$arrayMerge = array_merge($uno, $dos,$tres);
print_r($arrayMerge);
echo"<br/><br/>con array_push()<br/>";


$arrayPush = [];
    for ($i = 0; $i < count($arrayDeArrays); $i++) {
        for ($j = 0; $j < count($arrayDeArrays[$i]); $j++) {
            array_push($arrayPush, $arrayDeArrays[$i][$j]);
        }
    }
    print_r($arrayPush);

?>
</BODY>
</HTML>