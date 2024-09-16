<?php

$cadena = "Telescopia";

function Palindroma($cadena){

 $inicio = 0;   //Inicio de la cadena

 $fin = strlen($cadena)-1;  // Final de la cadena

 while (($inicio<$fin) && $cadena[$inicio]==$cadena[$fin]) {
    
    $inicio++;
    $fin--;

 }

return !($inicio<$fin);


}

if (Palindroma("apapa")) {
   
    echo "Es palindroma";

}else {
    
    echo "No es Palindroma";

}





?>