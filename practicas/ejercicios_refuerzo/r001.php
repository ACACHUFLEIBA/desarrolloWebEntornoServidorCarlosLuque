<HTML>
<HEAD>
    <TITLE> Mostar todos los números enteros, del 1 al 99, según aparece en el ejemplo</TITLE>
</HEAD>
<BODY>
<?php

echo"<table border =1>";

for ($i = 1 ; $i < 100 ;){
    echo "<tr>";
    
    for($j = 1; $j<=10;$j++){

    echo "<td> $i </td>";
     $i++;
}
}
echo"<tr/>";

?>
</BODY>
</HTML>