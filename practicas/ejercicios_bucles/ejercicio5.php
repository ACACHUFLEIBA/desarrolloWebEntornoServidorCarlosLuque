<HTML>
<HEAD><TITLE> EJ2B – Conversor decimal a cualquier base hexadecimal(16) 0-9/0-9
 * 10 A,11 B,12 C, 13 D,14 F.15 E</TITLE></HEAD>
<BODY>
<?php

$num="100";
$resultado="";



while($num / $16 != 0){
  
        
        $resultado.= (int)$num % 16
        $num= $num / 16;
        $num=intval($num);

    switch($resultado){
        case 0:
            echo "0";
            break;
        case 1:
            echo "1";
            break;
        case 2:
            echo "2";
            break;    
        case 3:
            echo "3";
            break; 
        case 4:
            echo "4";
            break; 
        case 5:
            echo "5";
            break; 
        case 6:
            echo "6";
            break; 
        case 7:
            echo "7";
            break; 
        case 8:
            echo "8";
            break; 
        case 8:
            echo "9";
            break; 
        case 10:
            echo "A";
            break; 
        case 11:
            echo "B";
            break; 
        case 12:
            echo "C";
            break; 
        case 13:
            echo "D";
            break; 
        case 14:
            echo "F";
            break; 
        case 15:
            echo "E";
            break; 
        case 16:
            default;

    }


        echo "<br/>";
        echo "$resultado";
    }


?>
</BODY>
</HTML>