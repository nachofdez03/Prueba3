<?php

$numeros = array();


// Rellenamos el array con 10 numeros
for ($i = 0; $i < 10; $i++) {
    
    $numeros[$i] = $i*3;

}


// Lo mostramos

for ($i=0; $i <10 ; $i++) { 

    echo "pos: ".$i." [".$numeros[$i]."] <br> ";
}

echo "pos3: ".$numeros[3]. "<br><br>";



for ($i=0; $i <count($numeros) ; $i++) { 
   
    echo "pos: ".$i." [".$numeros[$i]."] <br> ";

}

// Los valores se guardan por orden de inserccion no por orden de menor a mayor
foreach ($numeros as $clave => $valor) {
    
    echo "Clave: $clave Valor: $valor  <br>";

}

// Numero aleatorio

rand(0,30);


















?>