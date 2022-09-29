<HTML>
<HEAD><TITLE> Programa ej7am.php definir una matriz que permita almacenar la nota de 10 alumnos en 4 asignaturas
diferentes. Se pide:
a. Mostrar por pantalla el alumno con mayor nota en una asignatura determinada.
b. Mostrar por pantalla el alumno con menor nota en una asignatura determinada.
c. Para un alumno, mostrar en que materia tiene su nota más baja.
d. Para un alumno, mostrar en que materia tiene su nota más alta.
e. Mostrar la media por materia de todos los alumnos.
f. Mostrar la media por alumno para todas las materia

 </TITLE></HEAD>
<BODY>
<?php

$matriz[][]=array();
$arrayAlumnos=["Pepe","Juan","Ana","Cristina","Alberto","Mario","Raquel","Marta","Marcos","Leticia"];
$cabecera=["Asignatura/Nombre","Fol","Diseño cliente","Inglés","Interfaces"];
 echo "<table border='1'>";
 echo "<tr>";

for($i = 0;$i < count($cabecera);$i++){
    echo "<th>".$cabecera[$i]."</th>";
}
echo "</tr>";
 for($i = 0; $i <= 9; $i++){
     echo "<tr>";
     echo "<td>".$arrayAlumnos[$i]."</td>";
     for($j =0 ; $j <= 3; $j++){     
             
         $matriz[$i][$j]=rand(0,10);
         echo "<td>". $matriz[$i][$j]."</td>";
         echo " ";
     }
         echo "</tr>";
         
 }
 
 echo "</table>";



 
echo"<br>";
echo "Mayor nota en una asignatura determinada:";
echo"<br>";

$arrayMaximos[]=array();//vamos a guardar los maximos de cada columna del array
$maximo=0; //el numero maximo
$arrayAlumnoMaximo[]=array();
$arrayMinimos[]=array();//vamos a guardar los maximos de cada columna del array
$minimo=0; //el numero maximo
$arrayAlumnosMinimo[]=array();//es la posicion del array de los nombres del que ha sacado el maximo
for($i = 0; $i < count($matriz[$i]); $i++){     // poner e 0 o $i representa la primera fila de la matriz    
     
    $maximo=0;
    $minimo=10;
        for($j = 0; $j < count($matriz); $j++){
          
            if($maximo < $matriz[$j][$i]){//cuando encuentra una posicion > que el valor anterior se almacena como maximo de esa columna, 
                $maximo=$matriz[$j][$i];
                $arrayAlumnoMaximo[$i]=$j;//almacenamos la posicion de a quien pertenece en el array de nombres
            }
            if($minimo > $matriz[$j][$i]){//cuando encuentra una posicion > que el valor anterior se almacena como minimo de esa columna, 
                $minimo=$matriz[$j][$i];
                $arrayAlumnosMinimo[$i]=$j;//almacenamos la posicion de a quien pertenece en el array de nombres
            }
        }
        $arrayMaximos[$i]=$maximo;// almacenamos por cada asignatura(columna)las 4 notas maximas
        $arrayMinimos[$i]=$minimo;
     }
print_r($arrayMaximos);
echo"<br>";
print_r($arrayAlumnoMaximo);
echo"<br>";
for($i = 1; $i < count($cabecera); $i++){ //pintamos en que asignatura quien tiene la maxima nota
    echo $cabecera[$i]." : ". $arrayAlumnos[$arrayAlumnoMaximo[$i-1]];
    echo"<br>";
}
echo"<br>Minimos<br>";
print_r($arrayMinimos);
echo"<br>";
print_r($arrayAlumnosMinimo);
echo"<br>";
for($i = 1; $i < count($cabecera); $i++){ //pintamos en que asignatura quien tiene la minima nota
    echo $cabecera[$i]." : ". $arrayAlumnos[$arrayAlumnosMinimo[$i-1]];
    echo"<br>";
}

echo"<br>Minimo por alumno<br>";
$arrayAsignaturaMinimo[]=array();
for($i = 0; $i < count($matriz); $i++){       
     
    $arrayMinimos[$i]=min($matriz[$i]);
    
        for($j = 0; $j < count($matriz[$i]); $j++){
           if($matriz[$i][$j]==$arrayMinimos[$i]){
            $arrayAsignaturaMinimo[$i]=$j;
           }
        }
       
     }
print_r($arrayMinimos);
echo"<br>";
print_r($arrayAsignaturaMinimo);
echo"<br>";
for($i = 0; $i < count($arrayAlumnos); $i++){ //pintamos en que asignatura quien tiene la minima nota
    echo $arrayAlumnos[$i]." su minima nota en : ". $cabecera[$arrayAsignaturaMinimo[$i]+1];//asociamos
    echo"<br>";
}
echo"<br>Nota media por materia de todos los alumnos<br>";

$array_columnas=array();//creamo un array donde almacenaremos la suma de cada columna
$arrayMediaAsignatura[]=array();

for($i = 0; $i < count($matriz[$i]); $i++){     //hay que indicar el tamaño de la matriz conla i ya que count(matriz)= 10    
            
       $suma_columnas=0;//creamos la variable donde sumaremos cada valor de cada celda en cada columna
        for($j = 0; $j < count($matriz); $j++){           
         $suma_columnas+=intval($matriz[$j][$i]);       
        }
         $array_columnas[]=$suma_columnas;//volcamos cada suma de columnas en este array
         $arrayMedia[$i]=$array_columnas[$i]/count($matriz);//hallamos la media dividiendo por el total de posiciones
     }
     
 
     echo"<br>";
     for($i = 1; $i < count($cabecera); $i++){ //pintamos en que asignatura quien tiene la minima nota
        echo $cabecera[$i]." ";
        echo $arrayMedia[$i-1];
        echo"<br>";
    }
    echo"<br>";
    echo"<br>Mostrar la media por alumno para todas las materia<br>";
    echo"<br>";
$array_filas=array();//almacenaremos la la suma de las filas
$arrayMediaAlumnos[]=array();

for ($i =0; $i < count($matriz); $i++){
    $suma_filas=0;
    for($j= 0; $j < count($matriz[$i]); $j++){

        $suma_filas +=intval($matriz[$i][$j]);
       
    }
    $array_filas[] =$suma_filas;
    $arrayMediaAlumnos[$i]=$array_filas[$i]/count($matriz[$j]);
 
}
for($i = 1; $i < count($arrayAlumnos); $i++){ //pintamos en que asignatura quien tiene la minima nota
    echo $arrayAlumnos[$i]." ";
    echo $arrayMediaAlumnos[$i];
    echo"<br>";
}
// print_r($arrayAlumnos);echo"<br>";
// print_r($arrayMediaAlumnos);






?>

   
</BODY>
</HTML>